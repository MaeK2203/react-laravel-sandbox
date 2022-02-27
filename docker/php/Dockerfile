FROM node:17 AS node
FROM php:fpm

COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

COPY php.ini-development /usr/local/etc/php/php.ini

RUN apt-get update  && apt-get install -y --no-install-recommends \
     ca-certificates \
     curl \
     xz-utils \
     git \
     libgmp-dev \
     unzip \
     libzip-dev \
     lsb-release

RUN docker-php-ext-install pdo_mysql

# php composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# php-fpm config
COPY ./php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf

WORKDIR /var/www/html

