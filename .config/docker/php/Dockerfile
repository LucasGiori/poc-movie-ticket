FROM php:8.1.0-fpm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev \
        unzip \
		zip;

RUN apt-get update && apt-get install -y libpq-dev \
    && pecl install xdebug-3.1.2 \
    && docker-php-ext-install sockets bcmath pdo pdo_pgsql pgsql opcache \
    && docker-php-ext-enable xdebug

RUN apt-get install -y git

RUN export XDEBUG_SESSION=phpstorm;

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini