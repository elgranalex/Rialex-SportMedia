FROM php:8.2.0-apache
ARG DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli
COPY ./ /var/www/html/
RUN mkdir /var/www/html/img
RUN a2enmod rewrite 



