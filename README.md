# Getting started

## Installation

Clone the repository

    git clone https://github.com/Moinuddin16/E-commerce.git

Switch to the repo folder

    cd E-commerce

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server then you can now access the server at http://localhost/E-commerce/

**TL;DR command list**

    git clone https://github.com/Moinuddin16/E-commerce.git
    cd fake-reveiw
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**


Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

Thank you for follow those steps and successfully install this application.
## Website URL
http://localhost/E-commerce/

## Admin Panel URL
http://localhost/E-commerce/admin/login

## Admin Credentials
username : admin<br>
password : 123456


## User Panel URL
http://localhost/E-commerce/login

## User Credentials
username : user_0<br>
password : 123456

username : user_1<br>
password : 123456

username : user_2<br>
password : 123456

username : user_3<br>
password : 123456

username : user_4<br>
password : 123456