<?php

use yii\db\Connection;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php')
);

return [
    'components' => [
        'db'       => [
            'class' => Connection::class,
            'username'     => 'user',
            'password'     => 'password',
            'dsn'          => 'pgsql:host=pgsql;port=5432;dbname=postgres',
            'charset'      => 'utf8',
        ],
    ],
];
