<?php

namespace App\Facebook\Config;

use App\Facebook\Base\FromSql;

class Parser extends FromSql {
    
    protected $model = "App\Server";
    protected $required = ['dsn', 'user', 'password', 'table'];
   
}