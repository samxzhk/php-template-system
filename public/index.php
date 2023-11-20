<?php

use App\framework\helpers\Helper;

require __DIR__.'/../vendor/autoload.php';

session_start();

Helper::routerExecute();