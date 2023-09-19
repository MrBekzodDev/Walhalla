<?php

namespace vendor\myframe;

class Model
{
    public $db;
    public function __construct()
    {
        $conn = new Connection();
        $this->db = $conn->getConnection();
    }
}