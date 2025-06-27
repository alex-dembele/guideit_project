# On utilise l'image officielle de PHP
FROM php:8.2-fpm-alpine

# On définit le répertoire de travail dans le conteneur
WORKDIR /srv/app

# Installation des dépendances et extensions PHP nécessaires pour Symfony
RUN apk add --no-cache \
    icu-dev \
    libzip-dev \
    postgresql-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install -j$(nproc) \
    pdo pdo_pgsql \
    intl \
    zip \
    opcache \
    apcu

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# On s'assure que le cache de l'application appartient à l'utilisateur www-data
RUN mkdir -p var/cache var/log && chown -R www-data:www-data var