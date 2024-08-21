<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Data name
    |--------------------------------------------------------------------------
    |
    | PaginatedJsonResponse data object name in response.
    |
    */

    /**
     * @see \Cleanscripts\Rest\Http\PaginatedJsonResponse
     */
    'data_name' => 'items',

    /*
    |--------------------------------------------------------------------------
    | Meta name
    |--------------------------------------------------------------------------
    |
    | PaginatedJsonResponse meta info object name in response.
    |
    */

    /**
     * @see \Cleanscripts\Rest\Http\PaginatedJsonResponse
     */
    'meta_name' => 'meta',

    /*
    |--------------------------------------------------------------------------
    | Per page amount
    |--------------------------------------------------------------------------
    |
    | Amount of records to display per page.
    |
    */
    'per_page' => [
        'sm' => 10,
        'default' => 15,
        'md' => 25,
        'lg' => 50,
        'xl' => 100,
    ],

];
