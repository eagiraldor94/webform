# PHP Challenge

## Required enviroment

You will require:
* PHP 7.4+
* Apache Server
* Enable php sockets extension on php.ini file
* Mysql
* Composer
(An easy way is to install XAMPP/LAMPP as have almost all required items. Laragon is also a good option for windows users for easy virtual hosts.)

## Getting the code

Move to the folder where you will host the app (/opt/lampp/htdocs in case of lampp. c/laragon/www in case of laragon)
Run the next statement (replacing "folder_name"):
`git clone https://github.com/eagiraldor94/webform.git "folder_name"`

## Installing the app

Run: `composer install` to get the packages

## Creating database and data

Go to your Mysql client and create a new database

Use the ".env.sample" file to create a ".env" file. Is mandatory to fill details related to database, JWT secret (any string you want), and Swift mailer details. Also please note you will require an active ssl certificate (even if self signed) in order swift_mailer works properly. (Suggested laragon for certs, and gmail with application password).

Run the migrations(path based on project root "folder_name"):
* `php artisan migrate:refresh --seed`

Note: remember to setup you virtual host at public folder.
