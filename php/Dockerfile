ARG PHP_VERSION=""
FROM php:${PHP_VERSION:+${PHP_VERSION}-}fpm-alpine
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli
