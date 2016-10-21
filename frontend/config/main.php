<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [ 
      'message' => [
         'class' => 'frontend\modules\message\Message',
      ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
		  'view' => [
            'theme' => [
               'pathMap' => [
                  '@app/views' => '@vendor/gudezi/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                  //'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
               ],
            ],
		  ],
        'assetManager' => [
            'bundles' => [
               //'dmstr\web\AdminLteAsset' => [
               //   'skin' => 'skin-blue',
               'sofse\web\AdminLteAsset' => [
                  'skin' => 'skin-sofse',
                  //'skin' => 'skin-black',
               ],
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'baseUrl' => '',
            //'enableStrictParsing' => true,
            'rules' => [
               //['class' => 'common\helpers\UrlRule', 'connectionID' => 'db', /* ... */],
            ],
        ],

    ],
    'params' => $params,
];
