<?php
/**
 *  Routes definitions is a key-value paired array where
 *  keys are request uris and values are internal routes following this format:
 *
 *  '{moduleId}/{controllerId}/{actionId}'
 *  '{moduleId}/{subModuleId}/.../{controllerId}/{actionId}'
 */

return [
    '/' => 'site/default/index',
    '/about' => 'site/default/about',
    '/login' => 'site/default/login',
    '/logout' => 'site/default/logout',
    '/contact' => 'site/default/contact',
];
