<?php

namespace App\Facebook\Base;

use Exception;
use App\Facebook\Base\Base;

abstract class FromSql extends Base
{   
    protected $model = "";

    public function readConfig(int $id = 0)
    {
        $response = [
            'error' => false,
            'message' => '',
            'response' => []
        ];
        
       
        $content = $this->model::find($id);

        if($content)
        {
            $content = $content->toArray();

            $diff = $this->checkKeys(array_keys($content));
            if($diff)
            {
                $response['error'] = TRUE;
                $response['message'] = "Required: " . implode(',' , $diff);
            }
            else 
            {
                $response['response'] = $content;
            }

        }
        else {
            $response['error'] = TRUE;
            $response['message'] = "The connection with id '{$id}' does not exists";  
        }
        
        
        $this->config = $response;
    }
}

