<?php

namespace App\Facebook;

use App\Facebook\Config\{
    App,
    Fields,
    LinkSource,
    Parser,
    Result
};


class Container {
    
    protected $classMap = [
        'app'       => App::class,
        'fields'    => Fields::class,
        'linkSource'=> LinkSource::class,
        'result'    => Result::class,
        'parser'    => Parser::class,
    ];
    
    public function get(string $name, int $id = 0) {
        
        if(isset($this->classMap[$name]))
        {
            $class = (new $this->classMap[$name]);
            $class->readConfig($id);
            return $class;
        }
        
        return null;
    }
            
}

