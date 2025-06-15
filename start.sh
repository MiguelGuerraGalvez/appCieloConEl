#!/bin/bash

# Este script se ejecutará cuando el contenedor se inicie

echo "Running Laravel pre-start commands..."

# Limpiar cachés de Laravel
# Importante: Usamos '|| true' para que el script no falle si el comando falla
# (por ejemplo, si la DB no está lista inmediatamente, aunque debería estarlo al inicio del contenedor)
php artisan config:clear || true
php artisan cache:clear || true
php artisan optimize:clear || true # Para Laravel 8+ para limpiar optimizaciones de rutas/vistas

# Si necesitas migraciones en cada inicio (usar con precaución en producción)
# php artisan migrate --force || true

echo "Laravel commands executed."

# Iniciar el servidor Apache en primer plano
exec apache2-foreground