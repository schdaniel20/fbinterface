<?php

namespace App\Facebook\Base;

use Illuminate\Support\Facades\Storage;
use Exception;
use App\Facebook\Base\Base;

abstract class FromFile extends Base
{
    protected $fileName;
    protected $format = 'json';
    protected $baseFolder = 'facebookConfig/';
    
    public function readConfig(int $id = 0)
    {
        $file = "{$this->baseFolder}{$this->fileName}.{$this->format}";
        $response = [
            'error' => false,
            'message' => '',
            'response' => []
        ];
        
        if(Storage::disk('local')->exists($file))
        {
            $content = json_decode(Storage::get($file), true);
            if($content)
            {
                $diff = $this->checkKeys(array_keys($content));
                if($diff)
                {
                    $response['error'] = TRUE;
                    $response['message'] = "The {$file} file is not complete. Required: " . implode(',' , $diff);
                }
                else 
                {
                    $response['response'] = $content;
                }
                
            }
            else {
                $response['error'] = TRUE;
                $response['message'] = "Empty content or json is not valid";  
            }
        }
        else
        {
            $response['error'] = TRUE;
            $response['message'] = "The file {$file} does not exists";
        }
        
        $this->config = $response;
    }
}

