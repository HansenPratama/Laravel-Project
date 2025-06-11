FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    libzip-dev \
    libpng-dev \
    zip \
    && docker-php-ext-install pdo pdo_sqlite zip gd

RUN a2enmod rewrite

COPY . /var/www/html/

WORKDIR /var/www/html/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache database

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80
