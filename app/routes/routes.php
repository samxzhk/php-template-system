<?php

namespace App\routes;

return [
    'get' => [
        '/' => 'HomeController@index',
        '/login' => 'LoginController@index'
    ],
    'post' => []
];
