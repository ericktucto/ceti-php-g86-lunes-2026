FROM php:8.5-fpm-alpine

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS
RUN pecl install redis
RUN docker-php-ext-enable redis
RUN apk del .build-deps

WORKDIR /srv
