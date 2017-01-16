<?php

namespace App\Facebook\Interfaces;

interface Config
{
    public function getConfig(int $id = 0) : array;
}
