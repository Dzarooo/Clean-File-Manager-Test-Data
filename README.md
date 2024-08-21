# SZYBKIE README

> [!WARNING]  
> Aby wszystko działało poprawnie, należy skonfigurować paczkę CleanApi oraz paczkę CleanFileManager

## Szybki poradnik co zrobić aby ten projekt w ogóle działał

najpierw puścić komendy `composer install` i `composer update`

Następnie dodać do `composer.json` takowe linijki:
```php
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/CleanScripts/cleanapi.git"
    },
],
"require": {
    "cleanscripts/cleanapi": "^1.0"
}
```
i puścić komendę:
```
composer update CleanScripts/CleanApi
```

Następnie dodać kolejne linijki do composer.json:
```php
"repositories" : [
    {
        "type": "path",
        "url": "packages/CleanScripts/CleanFileManager",
        "options": {
            "symlink": true
        }
    }
]
"require": {
    "cleanscripts/cleanfilemanager"
}
```
i puścić komendę:
```
composer update CleanScripts/CleanFileManager
```

następnie dodac providersów w `bootstrap/providers.php`:
```php
return [
    Cleanscripts\CleanApi\Rest\Providers\MacroServiceProvider::class,
    Cleanscripts\CleanApi\Rest\Providers\ModuleServiceProvider::class,
    CleanScripts\CleanFileManager\CleanFileManagerServiceProvider::class,
    Owenoj\LaravelGetId3\GetId3ServiceProvider::class,
]
```

dla pewności można puścić zestaw kilku komend:
```
composer update
composer dump-autoload
php artisan cache:clear
php artisan route:clear
```

opublikować config dla cleanfilemanager:
```php
php artisan vendor:publish
//wybrać z listy CleanScripts\CleanFileManager\CleanFileManagerServiceProvider
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
- `POST` forceLogin - login był kiedyś potrzebny żeby dodać jakikolwiek plik więc na szybko stworzyłem routea który po prostu logował użytkownika stworzonego w seederze
- `POST` logout - ta sama przyczyna co forceLogin
- `GET` / - domyślny route którzy przenosi na view home.blade.php

#### Komendy do tinkera
Żeby podejrzeć zawartości tablic poprzez modele, podano dokładne ścieżki do modeli poniżej:
- File: `CleanScripts\CleanFileManager\Models\File`
- Document: `App\Modules\Document\Models\Document`
- Image: `App\Modules\Image\Models\Image`
- Invoice: `App\Modules\Invoice\Models\Invoice`
- Report: `App\Modules\Report\Models\Report`