

## Todo



- Auth Login perfektionieren, Auth Register finalisieren, Rest vom Auth-Part, siehe https://laravel.com/docs/8.x/blade
- Homepage und Dashboard, mobile
- How to Tailwind? 
  - Colors, Gradients
  - Fonts, Headings
  - Roundings, Shadows, Borders
  - Stubs? https://github.com/laravel-frontend-presets/tailwindcss/tree/main/src und https://github.com/laravel-frontend-presets/tailwindcss/blob/main/src/TailwindCssPresetServiceProvider.php
  - More Stubs? https://arievisser.com/blog/how-to-use-stub-customization-in-laravel/
- Social Auth nur wenns auch tut, übersetzen
- Email-Adresse am User-Feld nur wenns auch so ist, siehe fortify-config
- Installation -> ersetzen der Default-Views, siehe https://github.com/laravel-frontend-presets/tailwindcss/blob/main/src/TailwindCssPreset.php
- https://tailwindcomponents.com/component/login-showhide-password Showhide PWD
- https://freek.dev/1886-simplifying-service-providers-in-laravel-packages

- That was interesting: https://github.com/redbastie/tailwire/tree/master/src
- https://laravel.com/docs/8.x/packages
- Package Course at Spatie
- Layouts, wie?
- Tailwind Config, wie?
- Commands
- UI man!
- docs



Tests

- Mit Jetstream
- Ohne Jetstream
- Mit Tailwind Preset
- mit anderem Gedöns
- Merken und Tests automatisieren?



## Requirements

- PHP 8
- Laravel 8
- NPM

- Packages? Jetstream or Tall...



## Installation

Create a new Laravel 8 project:

```bash
laravel new my-app
```

Configure your `.env` app, database, and mail values:

```
APP_*
DB_*
MAIL_*
```

Require Tailwire via composer:

```
composer require adrolli/tallui
```

Publish ...

```
php artisan vendor:publish --tag="tallui.config"
php artisan vendor:publish --tag="tallui.resources"
php artisan vendor:publish --tag="tallui.lang"
```



TODO - Install Tailwire:

```
php artisan tallui:install
```

https://github.com/redbastie/tailwire#installation



Thisismydeployment2021!



doku heco



- building packages
- debugging 
- testing?



https://serverlesslaravelcourse.com/  $249 (hat Alf)

Spatie https://front-line-php.com/ 79 € incl. 1x Ray

Spatie https://spatie.be/products/laravel-beyond-crud 199 € incl. 1x Ray

Spatie https://spatie.be/products/laravel-package-training 119 € incl. Ray

Spatie https://spatie.be/products/laravel-backup-server 129 €

Spatie https://spatie.be/products/mailcoach 179 € / 999 € unlimited (yearly?)

https://spatie.be/products/media-library-pro 299 € unlimited (yearly?)

https://laracasts.com/ $350 forever



Dev Tools & Training

Development, per Dev

- https://myray.app/ Spatie Ray - 39 € / year or 119 € / Lifetime

- https://usewindy.com Windy - $59 Lifetime (Alf vorhanden, also optional)
- https://skipper18.com Skipper - 295 € / dann 99 € jährlich (Alf vorhanden)



Deployment & Hosting

- Laravel Vapor - $399 year (Alternative Github Actions, viel mehr Arbeit, keine zero-downtime, kein auto-scaling)
- AWS - ca. 150 € mtl. siehe https://tech.chrishardie.com/2020/aws-hosting-costs-using-laravel-vapor/ and https://divinglaravel.com/cost-performance-optimization-in-laravel-vapor, https://usefathom.com/blog/vapor-one-year und 



Packages & Licenses

- https://tailwindui.com/ TailwindUI - 209 € Lifetime (Alf vorhanden, also optional)
- 