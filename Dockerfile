# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install dependencies sistem dan ekstensi PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libzip-dev \
    zip \
    sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite zip gd

# Aktifkan modul rewrite Apache
RUN a2enmod rewrite

# Set DocumentRoot ke folder public Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Copy semua file ke container
COPY . /var/www/html/

# Set direktori kerja
WORKDIR /var/www/html/

# Install Composer (ambil dari image composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependensi Laravel, abaikan sementara ekstensi platform yang belum tersedia
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-req=ext-zip --ignore-platform-req=ext-gd --ignore-platform-req=ext-fileinfo

# Buat file database sqlite (jika belum ada)
RUN mkdir -p database && touch database/database.sqlite

# Set permission direktori penting
RUN chmod -R 775 storage bootstrap/cache database && \
    chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
