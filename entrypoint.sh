#!/bin/sh
set -e

cd /var/www/html

if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
fi

php artisan key:generate --force
php artisan config:cache

exec "$@"
