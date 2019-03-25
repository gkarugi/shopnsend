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
            'permissions' => [
                'create-store' => true,
                'update-store' => true,
                'create-branch' => true,
                'update-branch' => true,
                'create-cashier' => true,
                'update-cashier' => true,
                'create-category' => true,
                'update-category' => true
            ],
        ],
        'store_owner' => [
            'name' => 'Store Owner',
            'slug' => 'store_owner',
            'permissions' => [
                'create-grouping' => true,
                'update-grouping' => true,
                'create-product' => true,
                'update-product' => true,
            ],
        ],
        'customer' => [
            'name' => 'Customer',
            'slug' => 'customer',
            'permissions' => [
            ],
        ],
        'cashier' => [
            'name' => 'Cashier',
            'slug' => 'cashier',
            'permissions' => [
                'manage-pos' => true
            ],
        ],
    ],
];
