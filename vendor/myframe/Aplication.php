<?php
namespace vendor\myframe;
class Aplication
{
    private $id = null;
    public function run(){
        $params = explode("/", ltrim($_SERVER['REQUEST_URI'], '/'));
        //Array ( [0] => category [1] => update [2] => 12 )

//        print_r( $params); die();

        $className = "controllers\\".ucfirst($params[0])."Controller";
        //controllers\CategoryController

        if(strpos($params[1], "?")){
            $data = explode("?", $params[1]);
            $functionName = $data[0];
        }else{
            $functionName = $params[1];
            //update or  any functions name else
        }



        if(isset($params[2])){
            $this->id = $params[2];

        }
        // if isset $params[2], $id = $params[2]

        $page = new $className();

        if(is_null($this->id)){ //if ain't come id from url
            $page->{$functionName}(); //update() or  any functions name else //update() or  any functions name else
        }else{
            $page->{$functionName}($this->id); //update() or  any functions name else with id
        }

    }
}