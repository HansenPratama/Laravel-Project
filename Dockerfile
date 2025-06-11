FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    libzip-dev \
    libpng-dev \
    zip \
    && docker-php-ext-install pdo pdo_sqlite zip gd

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy Laravel files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions
RUN chmod -R 775 storage bootstrap/cache database \
    && chown -R www-data:www-data .

# Expose port
EXPOSE 80
