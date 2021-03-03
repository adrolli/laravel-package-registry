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

## Step 3: Prepare to use Skipper

Connect MySQL Workbench, reverse engineer and save the model. Import the model into Skipper.

Now there are six entities in Skipper. Name the module (e. g. Laravel core) and create a new module (e. g. Application module) for your application. Set the properties migrations-disabled and models-disabled to true in the Laravel core module.

Save the Skipper-file into the projects root-folder. 

Now you can scaffold your own entities within the Application module, save and Export to ORM ...

## Step 4: Basic Templating

### Defining Colors in TailwindCSS

First, the easy way, I used the tailwind-config from https://github.com/laravel/laravel.com-next/blob/master/tailwind.config.js.

Then I ran npm run dev.

See https://tailwindcss.com/docs/guides/laravel and https://laravel.com/docs/8.x/mix.

### Defining Base Styles

In resources/css/app.css, but currently I do not need additional styling.

See https://tailwindcss.com/docs/preflight and https://tailwindcss.com/docs/adding-base-styles

### Building Blade Templates

Partials wie Header und Footer
Mit einfachen Komponenten wie dem TailwindUI Header ist ganz schnell eine funktionierende UI vorhanden. Das freie Beispiel in welcome.blade.php kopiert und mit entsprechenden Blade Directives für Login, Register und Dashboard ausgestattet ergibt schon eine klickbare Anwendung mit Login.

### Use DB ...

Categories
Then proceed to packages...