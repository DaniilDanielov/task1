<?php

use common\models\User;
use common\repository\CheckRepository;
use common\repository\CheckRepositoryInterface;
use common\repository\CookRepository;
use common\repository\CookRepositoryInterface;
use yii\web\JsonParser;
use yii\web\Request;
use yii\web\Response;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'container' => [
        'singletons'  => [
            CheckRepositoryInterface::class => CheckRepository::class,
            CookRepositoryInterface::class => CookRepository::class,
        ],
    ],
    'components' =>     [
        'request'    => [
            'class'                => Request::class,
            'parsers'              => ['application/json' => JsonParser::class],
            'enableCsrfCookie'     => false,
            'enableCsrfValidation' => false,
        ],
        'response'   => [
            'class'  => Response::class,
            'format' => 'json',
        ],
        'user'       => [
            'identityClass'   => User::class,
            'enableAutoLogin' => false,
            'enableSession'   => false,
            'autoRenewCookie' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => false,
            'showScriptName'      => false,
        ],
    ],
    'params' => $params,
];
