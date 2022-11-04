<?php
return [
    'basePath' => __DIR__ . '/../',
    'defaultLayoutPath' => '@app/modules/site/layouts',
    'defaultLayout' => 'main',
    'errorRoute' => 'site/default/error',
    'language' => getenv('APP_LANGUAGE'),
    'components' => [
        'Piko\View' => [],
        'Piko\Router' => [
            'construct' => [
                [
                    'routes' => require __DIR__ . '/routes.php',
                ]
            ]
        ],
        'Piko\User' => [
            'identityClass' => 'app\modules\site\models\UserIdentity',
        ]
    ],
    'modules' => [
        'site' => 'app\modules\site\Module'
    ],
    'bootstrap' => ['site']
];