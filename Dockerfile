# Utiliza la imagen de PHP 8.1.0 con Apache
FROM php:8.1.0-apache

# Actualiza el gestor de paquetes e instala las dependencias necesarias
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        unzip && \
    docker-php-ext-install zip && \
    a2enmod rewrite && \
    service apache2 restart

# Copia los archivos de tu proyecto al directorio de trabajo
WORKDIR /var/www/html
COPY . .

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las dependencias de PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Cambia el propietario del directorio de trabajo a www-data y establece los permisos adecuados
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/storage


# Establece el comando predeterminado para ejecutar el contenedor
CMD ["apache2-foreground"]
