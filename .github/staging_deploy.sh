#!/bin/bash
set -e
echo "Starting deployment ..."

# Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true

# Push merge into production
(git push) || true

git checkout staging

git pull

# Install Composer dependencies
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Clear old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Migrate database
php artisan migrate --force

# Reload PHP to update opcache
echo "" | sudo -S service php8.1-fpm reload

# Exit maintenance mode
php artisan up

echo "Deployment finished"




