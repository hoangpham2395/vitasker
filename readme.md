## System requirement

- DB: MySQL 5.6
- Apache: 2.4
- PHP: 7.1 
- Laravel: 5.6 
- Composer: 1.5.1 

## Deploy

- Permission
```
chmod -R 777 bootstrap/cache
chmod -R 777 storage/logs/
chmod -R 777 storage/framework
chmod -R 777 public/images
```

- Install composer
```
composer install
```

- Run deploy
``` 
cp .env.example .env
php artisan key:generate
```

- Config DB in .env
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vitasker
DB_USERNAME=root
DB_PASSWORD=
```

- Delete cache
```
php artisan config:cache
php artisan route:cache
php artisan view:cache
```