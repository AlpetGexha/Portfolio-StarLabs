<?php

namespace Controller;

class Controller
{
    public $db;

    public function __construct()
    {
        $this->db = \DB::getDB();
    }

}