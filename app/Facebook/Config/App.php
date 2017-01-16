<?php

namespace App\Facebook\Config;

use App\Facebook\Base\FromFile;

class App extends FromFile{
    
    protected $fileName = 'app';
    protected $format = 'json';
    protected $required = ['id', 'secret', 'token', 'graph'];
    protected $baseFolder = 'facebookConfig/';
   
}

