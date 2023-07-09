#/!bin/bash

php artisan migrate:fresh

php artisan storage:link

php artisan view:clear

php artisan db:seed --class=DatabaseSeeder
