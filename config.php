<?php
return [
    'basePath' => __DIR__,
    'defaultLayoutPath' => '@app/modules/site/layouts',
    'defaultLayout' => 'main',
    'errorRoute' => 'site/default/error',
    'language' => $_ENV['APP_LANGUAGE'] ?? 'en',
    'components' => [
        'router' => [
            'class' => 'piko\Router',
            'routes' => [
                '^/$' => 'site/default/index',
                '^/about$' => 'site/default/about',
                '^/login$' => 'site/default/login',
                '^/logout$' => 'site/default/logout',
                '^/contact$' => 'site/default/contact',
                '^/(\w+)/(\w+)/(\w+)' => '$1/$2/$3'
            ],
        ],
        'user' => [
            'class' => 'piko\User',
            'identityClass' => 'app\modules\site\models\User',
        ]
    ],
    'modules' => [
        'site' => 'app\modules\site\Module'
    ]
];
