#/!bin/bash

php artisan view:clear
php artisan migrate:fresh

php artisan db:seed --class=DatabaseSeeder
