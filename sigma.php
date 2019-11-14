<?php

return [
    'connection' => [
        'dbname' => 'db',
        'user' => 'user',
        'password' => 'password',
        'host' => 'mysql',
        'driver' => 'pdo_mysql'
        // 'host' => 'psql',
        // 'driver' => 'pdo_pgsql',
    ],
    'sigma' => [
        'table' => 'foo',
        'type' => 'Sigma\Document\Document',
        'fields' => ['name', 'name2', 'name3', 'name4']
    ]
];
