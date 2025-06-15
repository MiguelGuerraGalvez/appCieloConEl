# Stage 1: Build assets con Node
FROM node:20 as node

WORKDIR /var/www/html

COPY package*.json ./
RUN npm install

# --- CAMBIO IMPORTANTE AQUÍ: Copiar TODO el proyecto Laravel ---
COPY . .  # Copia todo el contenido del directorio actual (tu proyecto) al WORKDIR
# --- FIN CAMBIO IMPORTANTE ---

# Eliminamos estas líneas ya que 'COPY . .' ya las incluye y no son necesarias individualmente
# COPY vite.config.js ./
# COPY resources ./resources

# (Si usas webpack.mix.js) Si no, solo resources y vite.config.js bastan

RUN npm run build

# Stage 2: PHP + Apache
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip pdo_pgsql

# Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Aquí ya es correcto copiar todo de nuevo, para el contexto de PHP
COPY . /var/www/html/

# Copiar los assets build de Node (este ya era correcto y se mantiene)
COPY --from=node /var/www/html/public/build /var/www/html/public/build

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data /var/www/html

RUN a2enmod rewrite

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

COPY start.sh /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh

CMD ["/usr/local/bin/start.sh"]

EXPOSE 80