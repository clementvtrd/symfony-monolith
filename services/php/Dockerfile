FROM composer:2.8.0 AS composer

FROM dunglas/frankenphp:1.2.5-php8.3.10-alpine AS base

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY ./services/php/conf /usr/local/etc/php

RUN install-php-extensions \
  ctype \
  iconv \
  pdo_mysql \
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

# TODO: DEFINE THE SERVER_NAME ENVIRONMENT VARIABLE
ENV SERVER_NAME=
ENV FRANKENPHP_CONFIG="worker /app/public/index.php"
ENV APP_RUNTIME=Runtime\\FrankenPhpSymfony\\Runtime
ENV MAX_REQUESTS=64

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN frankenphp php-cli bin/console asset-map:compile
RUN frankenphp php-cli bin/console tailwind:build --minify

COPY ./app /app
