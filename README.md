# Corona Time

In Corona Times App you can check statistics all over the world.
##
## Table of Contents
* [Prerequisites](#prerequisites)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
* [Migrations](#migration)
* [Development](#development)
* [Mysql Diagram](#mysql-diagram)

##

## Prerequisites
* PHP
* MYSQL
* npm
* composer

##

## Tech Stack
* [Laravel](https://laravel.com/docs) - back-end framework
* [Spatie Translatable](https://spatie.be/docs/laravel-translatable/v6/introduction) - package for translation
* [Tailwind Css](https://tailwindcss.com/docs/installation) - package for styling

##

## Getting Started
1. First of all you need to clone Corona Times repository from github:

```bash
git clone https://github.com/RedberryInternship/nika-qanashvili-corona-time.git
```

2. Next step requires you to run composer install in order to install all the dependencies:

```bash
composer install
```
3. After you have installed all the PHP dependencies, it's time to install all the JS dependencies:

```bash
npm install
```
and also:

```bash
npm run dev
```

4. Now we need to set our env file. Go to the root of your project and execute this command.
```bash
cp .env.example .env
```

5. Now you should provide .env file all the necessary environment variables:
```bash
MAIL_BODY_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=*****
DB_USERNAME=*****
DB_PASSWORD=*****

MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=587
MAIL_USERNAME=*****
MAIL_PASSWORD=*****
MAIL_ENCRYPTION=tls
MAIL_FROM_NAME="CoronaTime"
```
##

## Migration

```sh
php artisan key:generate
```

Which generates auth key.

if you've completed getting started section, then just execute:
```bash
php artisan migrate
```
##

## Development
You can run Laravel's built-in development server by executing:
```bash
php artisan serve
```
when working on JS you may run:

```bash
npm run dev
```

##

## Mysql Diagram
<a href="https://ibb.co/GkWMpCs"><img src="https://i.ibb.co/hHBd92X/Screenshot-from-2023-05-01-10-23-50.png"
        alt="Screenshot-from-2023-05-01-10-23-50"></a>
