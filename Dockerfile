FROM php:8.0.9-cli-bullseye

RUN apt-get update && apt-get install -y \
        zip \
        unzip

# ------------------------
# Composer
# https://github.com/docker-library/php/issues/344#issuecomment-364843883
# ------------------------

COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer
RUN composer --version

# ------------------------

WORKDIR /var/package
