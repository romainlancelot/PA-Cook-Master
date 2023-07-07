#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true

# Pull the latest version of the app
git pull origin main

# Install composer dependencies
#composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
composer install

# Clear the old cache
php artisan clear-compiled

php artisan event:cache
php artisan route:cache
php artisan view:cache

# Recreate cache
#php artisan optimize

# Compile npm assets
npm i
npm run build

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"
