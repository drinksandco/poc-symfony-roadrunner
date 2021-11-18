FROM spiralscout/roadrunner:latest as rr

FROM php:8.0

RUN apt-get update && apt-get install -y \
  vim \
  libzip-dev \
  unzip \
  bash

# Install PHP Extensions
RUN docker-php-ext-install zip \
  && docker-php-ext-install sockets \
  && docker-php-ext-install opcache \
  && docker-php-ext-enable opcache

# Copy Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy RoadRunner
COPY --from=rr /usr/bin/rr /usr/bin/rr

# Copy RoadRunner config
#COPY --from=rr /etc/rr.yaml /etc/rr.yaml
