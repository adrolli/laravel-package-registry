# Docs

W-I-P - see DEVLOG.md 



### First start

```
# Repo von Github klonen, .env erstellen und composern
git clone https://github.com/heco-gmbh/hecoweb
cd hecoweb
cp .env.example .env
composer install

# sofern noch kein alias für sail exitiert, kann man in die ~/.bashrc übernehmen
alias sail='bash vendor/bin/sail'

## Assets builden
sail up
sail shell
npm install && npm run dev

# sofern noch kein key in der .env gesetzt ist
php artisan key:generate

# sofern an der .env was geändert wurde
php artisan config:clear

## Datenbank befüllen (Seeding fehlt noch)
php artisan migrate
```

### Plattformen

- Laravel: [http://localhost](http://localhost/)
- Mailhog: http://localhost:8025/
- Meilisearch: http://localhost:7700/