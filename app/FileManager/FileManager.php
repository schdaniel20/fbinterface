<?php

namespace App\FileManager;

use Illuminate\Support\Facades\Storage;

class FileManager {
    
    protected $data;
    protected $fileName;
    protected $path = "configFiles/";


    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }
    
    public function inToJson(array $data) : string
    {
        $data = json_encode($data, JSON_PRETTY_PRINT);
        $file = $this->fileName . ".json";
        
        Storage::disk('local')->put($this->path . $file, $data);
        return $this->path . $file;
    }
    
}
