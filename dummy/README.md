# Click-Dummy

This is a dummy.

## Fast checks

- http://localhost:3000/dummy/github-test.php?orga=spatie&repo=laravel-medialibrary
- http://localhost:3000/dummy/github-test.php?orga=barryvdh&repo=laravel-debugbar
- http://localhost:3000/dummy/github-test.php?orga=laravel&repo=laravel
- http://localhost:3000/dummy/github-test.php?orga=laravel&repo=framework
- http://localhost:3000/dummy/github-test.php?orga=flarum&repo=flarum -> illuminate in 2nd row of deps


## The problem

There are Laravel packages but there are also Laravel-compatible php-packages (like https://github.com/Intervention/image maybe),
Laravel Solutions (like Vapor), Laravel-non-packages (like Statamic V2, also non-OSS) and more shit to care about. How to ...?

The possible solution: Packages need to be registered and fall into following categories:
- Best of Laravel Packages
- Laravel Packages
- Laravel Solutions
- Laravel-compatible PHP Packages
- Works well with Laravel (Tailwind ...)
- Laravel Core Features


## Todo!

How to find a package? 
- Dependency on laravel/laravel, laravel/framework or illuminate/* (see spatie/laravel-medialibrary or barryvdh/laravel-debugbar) 
- Tag laravel (https://github.com/topics/laravel, but the first one fails, is a competitor in Golang)
- Is a PHP package (means works with composer)

Make research more comftable
- Link to Github etc.
- Nice templating

Start grabbing
- Create DB
- Fill in first data
- Output as list ...


## What?

Laravel is great. Laravel packages are great. Finding Laravel packages is time consuming and annoying.

This tool is an abbreviation. Find Laravel Packages...

One discovered packages / one is owner of a package? Both can edit?

Packages are not everything. Solutions and more ...?

### Registration of packages (registered users)

1) Register a Laravel Package -> Paste url (Github, Gitlab, Packagist, NPM) and redirect to registration
2) Complete Registration Form -> Query APIs, manually add information and complete registration, save as draft, adminmail
3) Admin: Edit, decline or release, mail to reporter

### Manage your packages

### Manage your stack

### Automatic builds like laravel.build (dreaming)

### Discover Laravel - the big pic
- Include News
- Include Laravel Docs
- Include Laravel.io?
- Include everything Laravel

### Refresh package (regularly or on request)

### Search package (filter)

## How?

- Reading from Github API - https://docs.github.com/en/rest
  - Github Stars etc.
  - Github Tags?
  - Github Languages?
  - Reading the composer.json file
    - require
    - require-dev
    - replace
    - provide
    - conflict
    - suggest
  - Reading the package.json file
    - devDependencies
    - peerDependencies
    - dependencies
- Reading from Packagist API - https://packagist.org/apidoc
- Reading from NPM - e.g. https://registry.npmjs.org/tailwindcss
- Reading from Gitlab - https://docs.gitlab.com/ee/api/