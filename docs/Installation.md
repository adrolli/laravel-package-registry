## Installation

### On shared host

Demo on https://lpr.dcn.de/

- SSH, Git and Composer required, NPM recommended

First installation

```bash
git clone git@github.com:adroll/laravel-package-registry.git
cd laravel-package-registry
composer update
composer install
copy .env.example .env
```

Then create a database and edit the database credentials in .env.

```bash
git status #watch for local changes, stash if there are some
git stash
git pull
composer update
composer install
```



Todo:

Mail is not configured - Expected response code 250 but got code "550", with message "550 5.7.1 Relaying denied "