<?php

namespace App\Facebook\Config;

use App\Facebook\Base\FromFile;

class Result extends FromFile {
    
    protected $fileName = 'result';
    protected $format = 'json';
    protected $required = ['table', 'dsn', 'user', 'password'];
    protected $baseFolder = 'facebookConfig/';
    
}