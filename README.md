<p align="center"><img src="./img/smartkot_laravel.png" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://img.shields.io/github/workflow/status/smart-kot/backend-API/Laravel/master?label=Laravel%20Master%20Build&logo=laravel&logoColor=white" alt="Build Status"></a>
<p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://img.shields.io/github/workflow/status/smart-kot/backend-API/Laravel/dev?label=Laravel%20Dev%20Build&logo=laravel&logoColor=white" alt="Build Status"></a>
<p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Smart-kot Backend API

## Information

This repo contains a full API for the Smart-kot Application. All Documentation about how to use the API can be found below. All information to install this repo now, can also found below. 

Later, all the repos will be included in docker.

## Documentation

To create an account send next information to the api server as a POST:

![createUser](./img/createUser.png)

``` text
<server_ip>/api/user
```

## Installation guide

1. Pull the repo to your computer.

2. create a .env based on the .env.example

3. Create the tables in your database using following cmd:

``` bash
php artisan migrate
```

4. Now you can start the API by using following cmd:

``` bash
php artisan serve
```
