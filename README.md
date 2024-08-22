# SZYBKIE README

> [!WARNING]  
> Przed zaczęciem konfiguracji, należy pobrać paczkę [CleanFileManager](https://github.com/CleanScripts/CleanFileManager) oraz umieścić ją w podanej ścieżce: `packages/CleanScripts/CleanFileManager/{zawartość paczki}`

## Szybki poradnik co zrobić aby ten projekt w ogóle działał

najpierw puścić komendy `composer install` i `composer update`

Następnie dodać do `composer.json` takowe linijki:
```php
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/CleanScripts/cleanapi.git"
    }
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
    "cleanscripts/cleanfilemanager": "dev-main"
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

opublikować config dla CleanApi oraz CleanFileManager:
```php
php artisan vendor:publish
//wybrać z listy CleanScripts\CleanFileManager\CleanFileManagerServiceProvider
```

Może być potrzeba zainstalowania paczek npm'a albo stworzenia vite manifestu. Jeśli takowa nastąpi, należy puścić następujące komendy:
```
npm install
npm run build
```



### TROCHĘ OPISU
W modułach (`App/Modules`) znadują się wszystkie modele, kontrolery i viewsy:
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

Użyć mozna je do wywowyłania metod Eloquenta w tinkerze, np. `CleanScripts\CleanFileManager\Models\File::get()`

#### Co jest czym?
- Home - służy tylko i wyłącznie do wyświetlania strony testowej. Nie ma w nim niczego związanego z faktyczną paczką.
- File - służy do zapisywania i walidacji plików oraz folderów. Zarówno pliki jak i foldery znajdują się w tablicy `files`.
- Invoice - model, którego instancje są po prostu reprezentacją jakiegoś rekordu w bazie (Invoice nie reprezentuje pliku!). Do instancji Invoice dołącza się pliki, które są instancjami innych modeli.
- Report - to samo co Invoice tylko inna nazwa :) .
- Document - model, ktorego instancje reprezentują pliki. Nie może istnieć samoczynnie, musi byc załączony albo do `Invoice` albo `Report`. Jego dane zapisują się do dwóch tabel: `documents` zapisuje dane dokumentu podane przez użytkownika (np. tytuł i ilość stron), a plik (dokument) sam w sobie zapisywany jest w `files`. rekord w `documents` jest połączony foreign key do rekordu w `files`.

#### Walidacja
Reguły walidacji definiują modele Invoice i Report. Każdy model który definiuje reguły musi implementować `\CleanScripts\CleanFileManager\Interfaces\HasFiles` oraz używać `\CleanScripts\CleanFileManager\Traits\HasFilesTrait`.

Skonfigurowana walidacja po pobraniu tego projektu wygląda następująco:
- Invoice: dopuszcza tylko i wyłącznie pdf'y, ma ograniczenie wielkości plików do 2MB (domyślna wartość).
- Report: Nie ma żadnej walidacji, przepuści wszystko (może że ktoś wrzuci plik który waży więcej niż `100000000000000` ;D )

Domyślne wartości walidacji znajdują się w `packages/CleanScripts/CleanFileManager/src/Traits/HasFilesTrait`. W modelu Invoice znajduje się przykładowe nadpisanie reguły walidacji:

```php
//app/Modules/Invoice/Models/Invoice.php

<?php

declare(strict_types=1);
// Model for uploading Invoices

namespace App\Modules\Invoice\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 *
 * @property int $id
 * @property string $number
 * @property string $title
 * @property string $service
 * @property float $price
 */
class Invoice extends Model implements \CleanScripts\CleanFileManager\Interfaces\HasFiles
{
    use \CleanScripts\CleanFileManager\Traits\HasFilesTrait;

    protected $fillable = [
        'number',
        'title',
        'service',
        'price',
    ];

    //tu znajduje się nadpisanie reguły walidacji, dokładnie dozwolonych mimes.
    public static function getAllowedFileMimes(): array
    {
        return ['pdf', 'application/pdf'];
    }
}

```
