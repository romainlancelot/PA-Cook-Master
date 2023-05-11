# Cookmasters webapp

## Description
Webapp for Cookmasters, a cooking recipe sharing platform.
You can find the webapp [here](https://cookmasters.fr/).

On this webapp, you can:
- Manage your account
- Manage your subscriptions plans
- Manage events
- Subscribe to workshops
- Follow home courses
- Make reservations for courses and pay online (Stripe)
- Manage catalog of services

## Installation
### Requirements
- PHP 8.1 or PHP 8.2
- Composer
- MariaDB

### Installation
1. Clone the repository
2. Install dependencies with `composer install`
3. Create a `.env.local` file and fill it with your database credentials
4. Create the database with `php artisan migrate`
5. Run the server with `php artisan serve`

composer require tightenco/ziggy