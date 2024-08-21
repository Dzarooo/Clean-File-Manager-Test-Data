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

**9.** Na końcu wprowadzić migracje <ins>Z SEEDEREM</ins> (seeder wprowadza domyślnego użytkownika do [forceLoginu](#routey))
```
php artisan migrate:fresh --seed
```

### TROCHĘ OPISU
W modułach znadują się wszystkie modele, kontrolery i viewsy:
- Home
- Document
- Image
- Invoice
- Report

(wyjątkiem jest model File ale on jest w paczce więc to logiczne ;) )

#### Routey

PRAWIE Wszystkie routey są w modułach, ale niektóre są w domyślnym pliku laravela:
- forceLogin - login był kiedyś potrzebny żeby dodać jakikolwiek plik więc na szybko stworzyłem routea który po prostu logował użytkownika stworzonego w seederze
- logout - ta sama przyczyna co forceLogin
- / - domyślny route którzy przenosi na view home.blade.php