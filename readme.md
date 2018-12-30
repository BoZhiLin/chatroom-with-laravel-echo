# chatroom-with-laravel-echo

## Installation
To install vendor and node_modules for laravel
```
$ composer install
$ npm install
```

## Laravel-echo-server
To install this for your system
```
$ npm install -g laravel-echo-server
```

## Environment
Copy .env.example and generate a key for laravel application
```
$ cp .env.example .env
$ php artisan key:generate
```

## Parameters
Modify your database parameters
```
$ vim .env
```

```
DB_DATABASE={db_name}
DB_USERNAME={db_user}
DB_PASSWORD={db_password}

BROADCAST_DRIVER=redis

QUEUE_CONNECTION=redis
```

## Database migrate
Execute database migration
```
$ php artisan migrate
```

## Redis
The project will use redis for broadcast, if you haven't install this yet, please install this

#### Linux
```$ sudo apt install redis-server```

#### Mac OS 
```$ brew install redis```

#### Windows 
[https://github.com/MicrosoftArchive/redis/releases](https://github.com/MicrosoftArchive/redis/releases)




## Running
Before you run these services, please check your MySQL and Redis are running
```
$ php artisan serve
$ php artisan queue:work
$ laravel-echo-server start
```
