# SZYBKIE README

**1.** Najpierw skonfigurować plik .env żeby była jakakolwiek baza danych

**2.** Następnie klasyczna komenda:
```
composer install
```

**3.** Zainstalować paczkę:
```
composer update CleanScripts\CleanApi
```

**4.** i jeszcze jedną paczkę:
```
composer update CleanScripts\CleanFileManager
```

**5.** Nie wiem w którym miejscu i czy w ogóle będzie potrzebne, ale polecam użyć tych komend na "zaś":
```
composer dump-autoload
composer update
php artisan route:clear
php artisan cache:clear
```

**6.** A dla pewności można użyc tej komendy i zobaczyć czy jest więcej route'ów niż tylko defaultowe:
```
php artisan route:list
```

**7.** W teorii config powinien już być ale nie zaszkodzi spróbować go opublicznić:
```php
php artisan vendor:publish
//z listy która się wyświetli wybrać CleanScripts\CleanFileManager\CleanFileManagerServiceProvider
```

**8.** Providery są już dodane więc nie powinno być z nimi problemu.