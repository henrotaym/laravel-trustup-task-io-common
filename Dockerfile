FROM composer:2.4.1 as deps

WORKDIR /app

COPY . .

RUN composer install

# -------------------

FROM php:8.1.10-cli as cli

WORKDIR /tmp

COPY --from=deps /app/vendor ./vendor

WORKDIR /app

COPY --from=deps /usr/bin/composer /usr/bin/composer
COPY --from=deps /app .

CMD ["cp", "-r", "/tmp/vendor", "/app/vendor"]

# -------------------

FROM node:16.17.0-alpine as node

WORKDIR /app

COPY ./package.json .