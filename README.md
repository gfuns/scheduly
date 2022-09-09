## About The Task

The task entails creating a well designed front end page where registered users can book an appointment to see you.

The **Dashboard/Admin View** should show the results of appointments users booked, records should be paginated to a maximum of 10 records per page.
The Admin should alo have the option to delete a user or an appointment from them.

## Implementation

The task was implemented using PHP Programming Language.
The Laravel-PHP framework was used.

## Deployment Guide

**Prerequisite:** It is assumed that your deployment system is configured and setup to run the Laravel Framework

1. Pull the project
2. Run Composer install using the command ```composer install```
3. Go to the **.env** file located at the root directory of the project and set your database table name and other credentials
3. Run Migration using the command ```php artisan migrate```
4. Run Database seeders using the command ```php artisan db:seed```

## Demo Admin Login Credentials
Email: gabriel@gmail.com
Password: 12345678

## Demo User Login Credentials
Email: johndoe@gmail.com
Password: 12345678