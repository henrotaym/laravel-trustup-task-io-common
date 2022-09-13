#!/usr/bin/env bash

# Source the ".env" file so Laravel's environment variables are available...
if [ -f ./.env ]; then
    source ./.env
fi

export PHP_SERVICE=${PHP_SERVICE:-"laravel-package-php-service"}
export NODE_SERVICE=${NODE_SERVICE:-"laravel-package-node-service"}

if [ "$1" == "unit" ]; then
    docker-compose run --rm ${PHP_SERVICE} ./vendor/bin/phpunit "${@:2}"
elif [ "$1" == "npm" ]; then
    docker-compose run --rm ${NODE_SERVICE} "$@"
else
    docker-compose run --rm ${PHP_SERVICE} "$@"
fi

