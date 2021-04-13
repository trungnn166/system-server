#ubuntu
FROM ubuntu:18.04


ENV TZ=Asia/Tokyo
WORKDIR /webapp

#php version 
FROM php:8.0-fpm
RUN apt-get update && apt-get install -y libzip-dev

# Extension zip for laravel
RUN docker-php-ext-install zip 

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer global require laravel/installer

RUN docker-php-ext-install mysqli pdo pdo_mysql