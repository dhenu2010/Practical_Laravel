
Create Project step
Step 1:Open Terminal and set root directory using command line
command: cd  c:\xampp\htdocs

Step 2:oper xampp control pannel and start apache and mysql server

Step 3:create laravel Project
Command:composer create-project --prefer-dist laravel/laravel:^7.0 laravel_practical

Step 4:move to Project directory
Command: cd laravel_practical

Step 5:update composer and install npm to built laravel mix
Command: Comoser Update
Command:npm install and npm run dev

Step 6:Running applications on the PHP development server
Command: php artisan serve

Step 7:Install Laravel's laravel/ui package that provides a quick way to scaffold all of the routes and views you need for authentication using following commands:

composer require laravel/ui:^2.4

php artisan ui vue --auth

create database same name as env file and migrate tables using php artisan migrate command

Step 8: set following values in env file to connect with database and email server.

Step 9:download adminlte theme and copy index.html to laravel project resources/views directory and rename it dashboard.blade.php and create admin folder and save dashboard file inside admin folder

Step 10:create route of dashboard blade file in home controller

Step 11:create admin folder and set layouts using dashboard blade file

Step 12:create layout folder and set following layouts from dashboardfile

-app.blade.php
-breadcrumb.blade.php
-navbar.blade.php
-mainsidebar.blade.php
-script.blade.php
-stylesheet.blade.php
-footer.blade.php

step 13:Now we need to add email verification setup, so basically we have to add email verification class implement in user model, use middleware for protection

routes/web.php
add this route:Auth::routes(['verify' => true]);

Home Controller crete class

Step 14:create controller for user CRUD
c:\xampp\htdocs\laravel_practical>php artisan make:controller UserController -r
Controller created successfully.

Create Seeder
Create Factory


   
