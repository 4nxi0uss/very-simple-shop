FROM php:8.2-fpm

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Installing dependencies for building the PHP modules
RUN apt update && \
    apt install -y zip libzip-dev libpng-dev libicu-dev libxml2-dev neovim

# Installing additional PHP modules
RUN docker-php-ext-install mysqli pdo pdo_mysql gd zip intl xml

# Cleaning APT cache
RUN apt clean

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY ["." ,"/var/www/html/"]

RUN composer install

