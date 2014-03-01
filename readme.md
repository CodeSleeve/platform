Codesleeve Platform
========

## Quickstart

Download by running this command in your console

```
    $ composer create-project --stability="dev" codesleeve/platform your-project-name
```

Start up a new laravel serve

```
    php artisan serve
```

Navigate your browser to the server

```
	http://localhost:8000
```

and use **admin** and **password** for the username and password.

## FAQ

### How do I manage environments?

Checkout the file called `env.php` which allows you to set your environment. If this file doesn't exist we just assume the environment is `production`.

