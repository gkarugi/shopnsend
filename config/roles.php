<?php

return [

    /*
    |--------------------------------------------------------------------------
    | The Application's roles
    |--------------------------------------------------------------------------
    |
    | Hee you can define the different roles fo this application. A role
    | has permissions which dictate what action a user can accomplish
    | upon a certain resource.
    |
    */

    'roles' => [
        'administrator' => [
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => [],
        ],
        'customer' => [
            'name' => 'Customer',
            'slug' => 'customer',
            'permissions' => [],
        ],
    ]
];
