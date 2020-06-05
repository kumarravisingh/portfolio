<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base Route
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Studio will be accessible from. You are free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env('STUDIO_PATH_NAME', 'studio'),

    /*
    |--------------------------------------------------------------------------
    | User Identifier
    |--------------------------------------------------------------------------
    |
    | This is the publicly identifying attribute given in the URL to expose
    | users. By default, the User ID will be used. Note that "username"
    | requires a canvas_user_meta record to exist and be defined.
    |
    | Supported Identifiers: "id", "username"
    |
    */

    'identifier' => env('STUDIO_USER_IDENTIFIER', 'id'),
];
