# Sigma-sync

<p align="center">
<a href="https://circleci.com/gh/mos-sigma/sigma-sync"><img src="https://circleci.com/gh/mos-sigma/sigma-sync.svg?style=svg&circle-token=ef57d3cd50af58d1f118f79805b5517a9d593fac" alt="Build Status"></a>

<a href="https://codecov.io/gh/mos-sigma/sigma">
  <img src="https://codecov.io/gh/mos-sigma/sigma/branch/master/graph/badge.svg" alt="Code coverage"/>
</a>

<a href="https://packagist.org/packages/mos-sigma/sigma">
  <img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="License"/>
</a>
</p>

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

## Contact
 For any question regarding this project feel free to send an e-mail to nicoorfi@mos-sigma.com.