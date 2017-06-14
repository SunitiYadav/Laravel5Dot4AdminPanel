
## Install

1) Run in your terminal:

by git clone 


2) Set your database information in your .env file (use the .env.example as an example);

3) Run in your Laravel5Dot4AdminPanel folder:
``` bash
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed --class="Backpack\Settings\database\seeds\SettingsTableSeeder"
$ php artisan serve

## Usage 

1. Register a new user at http://127.0.0.1:8000/admin/register
2. Your admin panel will be available at http://127.0.0.1:8000/admin/login
3. [optional] If you're building an admin panel, you should close the registration. In config/backpack/base.php look for "registration_open" and change it to false.


## Note

Considerd 3 type of users as 1 - Admin, 2 - User, and 3 - Optional.
It will allow Admin Panel login to only user type 1 as Admin.

