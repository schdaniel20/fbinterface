<?php

namespace App\Facebook\Config;

use App\Facebook\Base\FromFile;

class LinkSource extends FromFile {
    
    protected $fileName = 'linkSource';
    protected $format = 'json';
    protected $required = ['table', 'dsn', 'user', 'password'];
    protected $baseFolder = 'facebookConfig/';
   
}