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
    ]
];
