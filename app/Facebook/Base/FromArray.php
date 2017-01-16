<?php

namespace App\Facebook\Base;

use Exception;
use App\Facebook\Base\Base;

abstract class FromArray extends Base
{
    protected $fields = [];
    
    public function readConfig(int $id = 0)
    {
        $response = [
            'error' => false,
            'message' => '',
            'response' => []
        ];
        
        if(!isset($this->fields[$id]))
        {
           $response['error'] = true;
           $response['message'] = "Undefined offset: $id in array";
        }
        else 
        {            
            $response['response'] = $this->fields[$id];
        }
        
        $this->config = $response;
    }
}