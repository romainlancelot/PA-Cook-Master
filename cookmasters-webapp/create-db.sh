#/!bin/bash

php artisan migrate:fresh

rm ./public/images/equipments/*
rm ./public/images/rooms/*
rm ./public/images/services/*

php artisan db:seed --class=RoomSeeder
php artisan db:seed --class=EquipmentSeeder
php artisan db:seed --class=RoomEquipmentSeeder
php artisan db:seed --class=RoomOfferSeeder
php artisan db:seed --class=ServiceSeeder
php artisan db:seed --class=UsersSeeder
php artisan view:clear
