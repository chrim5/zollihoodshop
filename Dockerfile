FROM php:7.0-apache
RUN docker-php-source extract \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-source delete

COPY ./src /var/www/html
VOLUME /var/www/html
EXPOSE 80

