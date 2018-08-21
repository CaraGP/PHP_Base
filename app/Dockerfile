FROM php:7-apache-stretch

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html/

WORKDIR /var/www/html/
