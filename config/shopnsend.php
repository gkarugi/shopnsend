<?php

return [
    'number' => [
        'generator'         => 'time_hash', //possible values: time_hash, sequential_number

        'sequential_number' => [
            'start_sequence_from' => 1,
            'prefix'              => 'ORD-',
            'pad_length'          => 8,
            'pad_string'          => '0'
        ],

        'time_hash' => [
            'high_variance'   => false,
            'start_base_date' => '2000-01-01',
            'uppercase'       => true
        ]
    ],

    /*
     *  Available telcos for mobile numbers that shop and send supports.
     *  The regex allows for validation that a certain number provided
     *  belongs to one of the available telcos on shop and send.
     */
    'telcos' => [
        'safaricom_ke' => [
            'telco' => 'safaricom',
            'provider' => 'mpesa',
            'regex' => '2547(?:(?:[1249][0-9])|(?:0[0-8]))[0-9]{6}$',
        ],
        'airtel_ke' => [
            'telco' => 'airtel_ke',
            'provider' => 'airtel_money',
            'regex' => '2547(?:(?:[38][0-9])|(?:5[0-6])|(8[5-9]))[0-9]{6}$',
        ],
    ],
];
