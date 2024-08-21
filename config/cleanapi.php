<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Modules folder
    |--------------------------------------------------------------------------
    |
    | Path to folder where modules will be stored.
    |
    */
    'modules_folder' => 'Modules',

    /*
    |--------------------------------------------------------------------------
    | Request amount limit
    |--------------------------------------------------------------------------
    |
    | Limit for max. amount of requests to api per minute.
    |
    */

    'request_limit' => 60,

    /*
    |--------------------------------------------------------------------------
    | Url prefix for api routes
    |--------------------------------------------------------------------------
    |
    | Prefix for API URLs, enhances resource management.
    |
    */

    'api_url_prefix' => 'api',

    /*
    |--------------------------------------------------------------------------
    | Default middlewares
    |--------------------------------------------------------------------------
    |
    | Default middlewares used for the API endpoints.
    |
    */

    'middlewares' => ['api'],

    /*
    |--------------------------------------------------------------------------
    | Exception handlers
    |--------------------------------------------------------------------------
    |
    | A map of invokable classes used for handling specific exceptions.
    | Format: array<Exception, Handler>
    |
    */

    'handlers' => [
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class => \Cleanscripts\CleanApi\Rest\Exceptions\HttpExceptionHandler::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class => \Cleanscripts\CleanApi\Rest\Exceptions\HttpExceptionHandler::class,
        \Illuminate\Validation\ValidationException::class => \Cleanscripts\CleanApi\Rest\Exceptions\ValidationExceptionHandler::class,
        \Illuminate\Auth\AuthenticationException::class => \Cleanscripts\CleanApi\Rest\Exceptions\AuthenticationExceptionHandler::class,
    ],

];
