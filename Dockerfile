# Usar una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Habilitar el módulo rewrite de Apache
RUN a2enmod rewrite

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html

# Configurar Git para confiar en el directorio
RUN git config --global --add safe.directory /var/www/html

# Cambiar permisos para las carpetas de Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Eliminar el directorio vendor y el archivo composer.lock (si existen)
RUN rm -rf vendor composer.lock

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Permitir la ejecución de Composer como superusuario
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalar dependencias de Laravel desde cero
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Exponer el puerto de Apache
EXPOSE 80