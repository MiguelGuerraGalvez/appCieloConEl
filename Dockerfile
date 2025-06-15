# Stage 1: Build assets con Node
# Usamos una imagen de Node más ligera si es posible, o la oficial si se necesita todo
FROM node:20-alpine AS node_builder

# Define el directorio de trabajo para esta etapa
WORKDIR /app

# Copia los archivos de definición de dependencias del frontend (package.json, package-lock.json)
# antes de copiar todo el proyecto para aprovechar el cache de Docker.
# Esto solo se hace si estos archivos cambian, no si cambia cualquier otro archivo del proyecto.
COPY package*.json ./

# Instala las dependencias de Node
RUN npm install

# --- AHORA SÍ, COPIAMOS TODO EL PROYECTO Laravel ---
# Esto debe hacerse *después* de npm install para que el COPY del código de la app
# no invalide el caché de la capa de npm install cada vez que cambie un archivo.
COPY . .

# Elimina estas líneas ya que 'COPY . .' ya las incluye y no son necesarias individualmente
# COPY vite.config.js ./
# COPY resources ./resources

# (Si usas webpack.mix.js) Si no, solo resources y vite.config.js bastan
# Ejecuta la construcción de los assets (Tailwind CSS, Vue/React, etc.)
# Asegúrate de que esto genere los archivos en `public/build`
RUN npm run build


# Stage 2: PHP + Apache
FROM php:8.2-apache-alpine AS laravel_app

# Instala las extensiones PHP y dependencias del sistema necesarias
# alpine es más ligera, así que los paquetes pueden tener nombres diferentes (ej. libpng en vez de libpng-dev)
RUN apk add --no-cache \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    postgresql-dev \
    # Paquetes de construcción para pdo_pgsql, luego se pueden eliminar si usas multi-stage build final
    # Si no usas -alpine, los nombres de paquetes serán los que tenías originalmente (libpq-dev)

    && docker-php-ext-install pdo pdo_mysql zip pdo_pgsql \
    # Si usas apache-alpine, las extensiones a2enmod pueden ser diferentes o ya estar habilitadas
    # Asegúrate de que mod_rewrite esté habilitado si lo necesitas
    && rm -rf /var/lib/apt/lists/* # Limpia caché si usas Debian/Ubuntu, no Alpine

# Composer: Copia Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Define el directorio de trabajo para esta etapa
WORKDIR /var/www/html

# Copia todo el código fuente de Laravel AHORA, para que composer install tenga acceso a él
COPY . .

# Copiar los assets build de Node desde la etapa 'node_builder' a la carpeta 'public' de Laravel
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Instala las dependencias de Composer (esto debe hacerse *después* de copiar el código)
RUN composer install --no-dev --optimize-autoloader

# Configura permisos: www-data es el usuario por defecto de Apache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Habilita mod_rewrite (si usas la imagen apache, ya debería estar o ser `a2enmod rewrite`)
# Para imágenes Alpine de PHP-Apache, a veces no es necesario o se hace de otra forma.
# Si tu Apache no funciona con .htaccess, puede que necesites esto:
# RUN a2enmod rewrite # Descomentar si es necesario

# Configura el DocumentRoot de Apache para que apunte a la carpeta `public` de Laravel
# Este es un cambio crucial para Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Copia y da permisos al script de inicio
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Expone el puerto 80 (puerto por defecto de Apache)
EXPOSE 80

# Comando para iniciar el contenedor
CMD ["/usr/local/bin/start.sh"]
