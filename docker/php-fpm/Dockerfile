ARG PHP_VERSION=8.3

FROM php:${PHP_VERSION}-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install zip \
    intl \
    && docker-php-ext-enable intl \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /srv/www

COPY conf.d/app.ini $PHP_INI_DIR/conf.d/app.ini

COPY ../.. .

EXPOSE 9000

CMD ["php-fpm"]