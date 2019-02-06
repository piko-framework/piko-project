<?php
return [
    'basePath' => __DIR__,
    'defaultLayoutPath' => '@app/modules/site/layouts',
    'defaultLayout' => 'main',
    'errorRoute' => 'site/default/error',
    'language' => getenv('APP_LANGUAGE'),
    'components' => [
        'router' => [
            'class' => 'piko\Router',
            'routes' => [
                '^/$' => 'site/default/index',
                '^/about$' => 'site/default/about',
                '^/login$' => 'site/default/login',
                '^/logout$' => 'site/default/logout',
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
