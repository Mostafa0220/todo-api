# Todo App
A simple To-Do application & User AUTH API
# Technologies used:
- PHP Version 7.3
- Mysql Database
- [Lumen 5.5](https://lumen.laravel.com/docs/5.5)

## Quick Start

```bash
git clone https://github.com/Mostafa0220/todo-api && cd todo-api
cp .env.example .env
composer install
# configure your key, database, etc in `.env` file
php artisan migrate --seed
php -S localhost:9000 -t public
# default login is mostafa@gmail.com:123456
```
## public APIs:

# Register API:
![Register API](http://mos-tafa.com/screen-shots/register.png)

# Login API:
![Login API](http://mos-tafa.com/screen-shots/login.png)


## Authenticated users APIs:
In those APIs, you have to set two headers as listed below:
‘headers’ => 
[
    ‘Accept’ => ‘application/json’,
    ‘Authorization’ => ‘Bearer ‘.$accessToken,
]
# List Categories:
![List Categories](http://mos-tafa.com/screen-shots/list-all-category.png)

# Create Category:
![Create Category](http://mos-tafa.com/screen-shots/ceate-category.png)

# Update Category:
![Update Category](http://mos-tafa.com/screen-shots/update-category-success.png)

# Validation Update Category:
![Validation Update Category](http://mos-tafa.com/screen-shots/update-category-validation.png)

# Delete Category:
![Delete Category](http://mos-tafa.com/screen-shots/delete-category.png)
