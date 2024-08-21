<?php

declare(strict_types=1);

return [
    App\Providers\AppServiceProvider::class,
    Cleanscripts\CleanApi\Rest\Providers\MacroServiceProvider::class,
    Cleanscripts\CleanApi\Rest\Providers\ModuleServiceProvider::class,
    CleanScripts\CleanFileManager\CleanFileManagerServiceProvider::class,
    Owenoj\LaravelGetId3\GetId3ServiceProvider::class,
];
