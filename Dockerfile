FROM php:7.4-fpm-alpine

RUN apk add --no-cache \
    composer \
    postgresql-dev \
    oniguruma-dev \
    libxml2-dev \
    && docker-php-ext-install \
        bcmath \
        ctype \
        fileinfo \
        json \
        mbstring \
        pdo \
        pdo_pgsql \
        tokenizer \
        xml \
    && apk del --no-cache \
        oniguruma-dev \
        libxml2-dev

EXPOSE 9000