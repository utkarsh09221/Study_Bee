FROM php:8.1-apache

RUN docker-php-ext-install mysqli
RUN a2enmod rewrite

COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
