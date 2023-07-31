<?php
Config::set('virtualhome', [
    'active' => true,
    'path' => 'modules',
    'topmenu' => true,
    'hooks' => [
        'core_dbobject',
        'core_web'
    ],
]);