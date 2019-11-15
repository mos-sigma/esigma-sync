# Sigma-sync

Create a `sigma.php` file in the root of your project like below:

```
// sigma.php
<?php

return [
    'connection' => [
        'dbname' => 'db',
        'user' => 'user',
        'password' => 'password',
        'host' => 'mysql',
        'driver' => 'pdo_mysql'
    ],
    'sigma' => [
        'table' => 'foo',
        'type' => Sigma\Document\Document::class,
        'fields' => ['column1', 'column2']
    ]
];
```

## Installation

After you have replaced the values in the `sigma.php` execute:
```
$ ./vendor/bin/sigma install
```

## Uninstall 

In the root directory of your project run:
```
$ ./vendor/bin/sigma uninstall
```

All available documentation can be found [here](https://mossigma.com/docs/sync).