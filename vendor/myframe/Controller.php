<?php

namespace vendor\myframe;

class Controller
{
    public $view;
    public function __construct()
    {
        $this->view = new Views();
    }
}