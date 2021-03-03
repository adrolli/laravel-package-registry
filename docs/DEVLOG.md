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

## Step 3: Templating

Generelle Infos zu Tailwind unter https://tailwindcss.com/docs/guides/laravel und https://laravel.com/docs/8.x/mix.

Schrift
In Laravel wird standardmäßig Nunito verwendet. Wir ersetzen das durch unsere Hausschrift Manjari (https://fonts.googleapis.com/css2?family=Manjari:wght@100;400;700&display=swap) in tailwind.config.js, welcome.blade.php, app.blade.php, guest.blade.php, layout.blade.php und app.css (letzteres durch npm run dev).

Farben
Die Definition der Grundfarben ist sehr einfach. In der tailwind.config.js habe ich vier Farben definiert:

    theme: {
        extend: {
            colors: {
                'heco-blue': '#005D9D',
                'heco-grey': '#83888B',
                'heco-lite': '#EAEAEA',
                'heco-dark': '#5A6166',
            },
            fontFamily: {
                sans: ['Manjari', ...defaultTheme.fontFamily.sans],
            },
        },
    },
Danach npm run watch, npm run dev oder npm run prod

Verwenden kann man dann z. B. die Klasse bg-heco-blue oder text-heco-grey ...

Mehr Infos: https://tailwindcss.com/docs/customizing-colors

Base Styles
Die Definition der Base Styles ist in resources/css/app.css am Besten aufgehoben:

@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
    h1 {
      @apply text-2xl;
    }
    h2 {
      @apply text-xl;
    }
    h3 {
        @apply text-lg;
      }
    a {
        @apply text-heco-blue underline;
    }
  }
An diese Stelle gehört später auch (sowenig wie möglich) Custom CSS.

Mehr Infos: https://tailwindcss.com/docs/preflight, https://tailwindcss.com/docs/adding-base-styles

Partials wie Header und Footer
Mit einfachen Komponenten wie dem TailwindUI Header ist ganz schnell eine funktionierende UI vorhanden. Das freie Beispiel in welcome.blade.php kopiert und mit entsprechenden Blade Directives für Login, Register und Dashboard ausgestattet ergibt schon eine klickbare Anwendung mit Login.