<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'charset' => 'utf-8', 
    'layout' => 'main',
    'defaultRoute' => 'site/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'layout' => '__main',
            'class' => 'app\modules\admin\Module',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok 
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'img/store', //path to origin images
            'imagesCachePath' => 'img/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
//            'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
//            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
        'debug' => [ // панель на хостинге 
            'class' => 'yii\debug\Module', //
            'allowedIPs' => ['127.0.0.1', '::1'], //
            'panels' => [
                'httpclient' => [
                    'class' => 'yii\\httpclient\\debug\\HttpClientPanel',
                ],
            ],
        ],
    ],
    'components' => [
        'mailler' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'oiwj dgoaejkrigoje0934itbmi34tnb340ntb34erfg',
            'baseUrl' => '',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru', // посмотреть настройки на яндекс
                'username' => 'www.disigner@yandex.ru',
                'password' => 'www.dsgnr.03.03.2017',
                'port' => 465,
                'encryption' => 'ssl',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
       
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => 'http://ksweb.local',
            'rules' => [
                 '<action:[\w\-]+>' => 'site/<action>',
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'], // Подключение Gii 
    ];
    $config['modules']['debug']['allowedIPs'] = ['*', '::1'];
    
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'], // Подключение Gii 
    ];
}

return $config;
