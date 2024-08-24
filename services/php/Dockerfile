FROM composer:2.7.8 AS composer

FROM dunglas/frankenphp:1.2.4-php8.3.10-alpine AS base

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY ./services/php/conf /usr/local/etc/php

RUN install-php-extensions \
  ctype \
  iconv \
  opcache \
  pcre \
  redis \
  session \
  tokenizer \
  xml \
  zip

FROM base AS dev

ENV SERVER_NAME=localhost
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

FROM base AS release

ENV SERVER_NAME=
ENV FRANKENPHP_CONFIG="worker /app/public/index.php"
ENV APP_RUNTIME=Runtime\\FrankenPhpSymfony\\Runtime
ENV MAX_REQUESTS=64
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY ./app /app
