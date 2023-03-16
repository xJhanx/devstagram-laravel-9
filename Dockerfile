FROM php:8.1.0-apache

RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        unzip && \
    docker-php-ext-install zip && \
    a2enmod rewrite && \
    service apache2 restart

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/storage

CMD ["apache2-foreground"]
