<?php

namespace App\Facebook\Base;

use Illuminate\Support\Facades\Storage;
use Exception;

abstract class Base {
    
    protected $required = [];
    protected $config = [
            'error' => false,
            'message' => '',
            'response' => []
        ];


    public function checkKeys(array $keys) : array
    {
        return array_diff($this->required, $keys);
    }
    
    public function getResponse() : array
    {
        return $this->config['response'];
    }
    
    public abstract function readConfig(int $id = 0);
    
    public function set(string $key , $value) : bool
    {
        if(in_array($key, $this->required))
        {
            $this->config['response'][$key] = $value;
            return true;
        }
        return false;
    }
    
    public function hasError() : bool
    {
        return $this->config['error'];
    }
    
    public function getErrorMessage() : string
    {
        return $this->config['message'];
    }
    
}