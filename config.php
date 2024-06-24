<?php
Config::set('virtualhome', [
    'active' => true,
    'path' => 'modules',
    'topmenu' => true,
    'hooks' => [
        'core_dbobject',
        'core_web'
    ],
    'download_window' => 2, // in seconds 
]);