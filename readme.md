Codesleeve Platform
========

# Quickstart

Download by running this command in your console

```
    $ composer create-project --stability="dev" codesleeve/platform your-project-name

```

Start up a new laravel server

```
    php artisan serve
```

Navigate your browser to `http://localhost:8000/login` and use `admin` and `password` for the username and password.


# What if I want to install platform into an existing project?

If you already have an existing laravel 4.1 project then you can follow the instructions on each individual component page.

	- You will need to install [platform-core.](https://github.com/CodeSleeve/platform-core)
	- If you want pages, menus then integrate [platform-publish](https://github.com/CodeSleeve/platform-publish)

# How do I manage environments?

If you copied the `bootstrap/start.php` file during `platform:setup` then you simply need to set in `~/.bashrc`

```
	LARAVEL_ENV="local"
```

We don't make use of hostnames or machine names as this is insecure and difficult to manage across teams and different machines.