FROM symfony/php:8.2-fpm-alpine

# extensions PHP
RUN docker-php-ext-install pdo_pgsql

# installation de composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
