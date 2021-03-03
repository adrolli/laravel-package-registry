# Devlog

## Step 1: Create Laravel App using Laravel Sail

Windows: use Microsoft Terminal and Ubuntu WSL2:

```bash
curl -s https://laravel.build/hecoweb | bash
alias sail='bash vendor/bin/sail'
cd hecoweb && sail up
```

Add the alias to ~/.bashrc.

## Step 2: Install Laravel Jetstream

In Docker container (sail shell):

```bash
composer require laravel/jetstream
php artisan jetstream:install livewire
npm install && npm run dev
php artisan migrate
php artisan vendor:publish --tag=jetstream-views
```

Problems with Artisan Migrate? 
Change .env DB_HOST to mysql, sail down -v, sail up, sail shell and php artisan config:clear. Then do php artisan migrate again.

See https://jetstream.laravel.com/

