# Gunakan image PHP 8.2 resmi sebagai base image
FROM php:8.2-fpm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install ekstensi PHP yang dibutuhkan (sesuaikan jika perlu)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    libjpeg-dev \
    libwebp-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && docker-php-ext-enable pdo_mysql mbstring exif pcntl bcmath gd zip

# Set working directory di dalam container
WORKDIR /app

# Salin semua file proyek Anda ke dalam container
COPY . /app

# Jalankan composer install
# --no-dev untuk produksi, --optimize-autoloader untuk performa
RUN composer update --no-dev --no-scripts --optimize-autoloader

# Hapus cache yang tidak perlu
RUN rm -rf /root/.composer

# Atur izin file (penting untuk Laravel)
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Perintah untuk menjalankan aplikasi
CMD ["php-fpm"]