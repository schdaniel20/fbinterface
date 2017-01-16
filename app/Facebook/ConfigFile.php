<?php

namespace App\Facebook;

use App\Facebook\App;
use App\Facebook\Fields;
use App\Facebook\LinkSource;
use App\Facebook\Result;

class ConfigFile {
    
    protected $config = [];
    protected $sid;
    protected $country;

    public function __construct(int $sid, int $country)
    {
        $this->sid = $sid;
        $this->country = $country;        
    }
    
    public function createConfig(array $app, array $field, array $target, array $source) 
    {
        $this->config['facebook'] = $app;
        $this->config['fields'] = $field;
        $this->config['source'] = $source;
        $this->config['target'] = $target;
        $this->config['countryCode'] = $this->country;
        $this->config['sessionID'] = $this->sid;
    }
    
    public function getConfig() : array 
    {
        return $this->config;
    }
    
}