FROM php:8.2.18-fpm-bullseye

RUN apt-get update
RUN apt-get install -y libzip-dev
RUN apt-get install -y zip
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

COPY ./composer_setup_script.sh /var/tmp
RUN cd /var/tmp && chmod 700 ./composer_setup_script.sh && ./composer_setup_script.sh


WORKDIR /app/app