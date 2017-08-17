FROM php:5.6.31-fpm

COPY php.ini /usr/local/etc/php/
COPY php.ini /etc/

RUN apt-get update \
&& apt-get install -y zlib1g-dev mysql-client wget git \
&& wget -c https://getcomposer.org/download/1.5.1/composer.phar -O /usr/local/bin/composer \
&& chmod +x /usr/local/bin/composer \
&& docker-php-ext-install opcache zip pdo pdo_mysql