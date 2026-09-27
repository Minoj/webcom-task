FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    intl

RUN echo "log_errors=On" > /usr/local/etc/php/conf.d/errors.ini \
    && echo "error_log=/proc/self/fd/2" >> /usr/local/etc/php/conf.d/errors.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
