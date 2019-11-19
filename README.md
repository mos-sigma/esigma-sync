# Sigma-sync

<p align="left">
<a href="https://circleci.com/gh/mos-sigma/sigma-sync" target="_blank">
  <img target="_blank" src="https://img.shields.io/circleci/build/github/mos-sigma/sigma-sync" alt="Build Status">
</a>

<a href="https://codecov.io/gh/mos-sigma/sigma-sync">
  <img src="https://img.shields.io/codecov/c/github/mos-sigma/sigma-sync" alt="Code coverage"/>
</a>

<a href="https://packagist.org/packages/mos-sigma/sigma">
  <img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="License"/>
</a>
</p>

## Installation

Create a `sigma.php` file in the root of your project like below:

```php
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

After you have replaced the values in the `sigma.php` execute:
```sh
$ ./vendor/bin/sigma install
```

## Uninstall 

In the root directory of your project run:
```sh
$ ./vendor/bin/sigma uninstall
```

All available documentation can be found [here](https://mossigma.com/docs/sync).

## Contact
 For any question regarding this project feel free to send an e-mail to nicoorfi@mos-sigma.com.