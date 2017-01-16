<?php

namespace App\Facebook;

use App\Facebook\Base\FromSql;

class Test  extends FromSql{
    
    protected $model = "App\Server";
    protected $required = ['dns'];
}

