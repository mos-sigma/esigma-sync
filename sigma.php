<?php

;

return [
    'connection' => [
        'dbname' => 'db',
        'user' => 'user',
        'password' => 'password',
        'host' => 'mysql',
        'driver' => 'pdo_mysql'
    ],
    'sigma' => [
        'table' => 'products',
        'type' => Index::class,
        'fields' => ['name', 'name2']
    ]
];
