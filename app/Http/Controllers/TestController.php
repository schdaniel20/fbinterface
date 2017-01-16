<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Facebook\ConfigFile;
use App\Facebook\LinkSource;
use App\Facebook\Result;
use App\Facebook\Fields;
use App\Facebook\App;
use Cylex\Facebook\Parser\DataSource;
use Cylex\Facebook\Parser\Parser;
use Cylex\Facebook\Parser\DataTarget;

use Illuminate\Queue\QueueManager;
use Illuminate\Contracts\Queue\Factory as FactoryContract;

use App\UserType;
use App\Permission;

use App\Facebook\Test;

use App\Facebook\Container;

class TestController extends Controller
{
    public function show(FactoryContract $manager)
    {        
        $a = new Container();
        $b = $a->getConfig('parser', 0);
        
        print_r($b->getConfig());
    }
    
    public function save(Request $request)
    {
       
    }
}
