# On utilise l'image officielle de PHP
FROM php:8.-fpm-alpine

# On définit le répertoire de travail dans le conteneur
WORKDIR /srv/app

# Étape 1: Installation des dépendances système nécessaires pour les extensions PHP
# On ajoute aussi les outils pour compiler (build-base) et les headers de postgresql
RUN apk add --no-cache \
    $PHPIZE_DEPS \
    icu-dev \
    libzip-dev \
    postgresql-dev

# Étape 2: Installation des extensions PHP "core"
RUN docker-php-ext-configure zip \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_pgsql \
    intl \
    zip

# Étape 3: Installation des extensions via PECL (PHP Extension Community Library)
# C'est la méthode recommandée pour APCu
RUN pecl install apcu \
    && docker-php-ext-enable apcu

# Étape 4: On active Opcache, qui est souvent déjà compilé mais doit être activé
RUN docker-php-ext-enable opcache

# Étape 5: Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Étape 6: On s'assure que le cache de l'application appartient à l'utilisateur www-data
# Cela prévient des problèmes de permissions avec Symfony
RUN mkdir -p var/cache var/log && chown -R www-data:www-data var