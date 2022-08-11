# API Documentation
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/14949872-e273e4fe-11e6-4ac0-847b-f14a0e59aa40?action=collection%2Ffork&collection-url=entityId%3D14949872-e273e4fe-11e6-4ac0-847b-f14a0e59aa40%26entityType%3Dcollection%26workspaceId%3D91884579-79d3-4abe-b16b-799e9d14b8b2)

# Requirements
|Name|Version|
|:-:|--|
|PHP|7.4.29|
|Laravel|8.0|
|NodeJS|16.15.1|
|MySQL|any/latest|

# Installation
1. install all dependencies php
   ```bash
    composer install
   ```
2. make env file
   ```bash 
    cp .env.example .env
   ```
3. generate key
   ```bash 
    php artisan key:generate
   ```
4. create database name reference from env file
5. install all dependencies NodeJS
   ```bash
    npm install && npm run dev
   ```   
   or 
   ```bash
    npm install && npm run prod
   ```
6. migrate all database
   ```bash
    php artisan migrate
   ```
7. seeding database (optional)
    ```bash
    php artisan db:seed --class=DatabaseSeeder
    ```
