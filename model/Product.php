<?php

namespace model;

use components\Constants;
use vendor\myframe\Connection;
use vendor\myframe\Model;
use PDO;

class Product extends Model
{


    public function getProductList($page, $withoutLimit = false){
        $offset = ($page - 1) * Constants::LIMIT;

        if($withoutLimit){
            $sql = "select * from product";
            $state = $this->db->prepare($sql);
        }else{
            $sql = "select * from product limit :offset, :limit";
            $state = $this->db->prepare($sql);
            $state->bindValue(":limit", Constants::LIMIT, PDO::PARAM_INT);
            $state->bindValue(":offset", $offset, PDO::PARAM_INT);
        }
        $state->execute();
        $result = $state->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }

    public function addProduct($productName , $categoryId, $description){
        $sqlInsert = "insert into product (name),(category_id) values (:name)";
        $state = $this->db->prepare($sqlInsert);
        $state->bindValue(":name",$productName);
        $state->execute();
        if ($state->rowCount() === 0) {
            die("Error inserting data: " . $state->errorInfo()[1]);
        }
    }

    public function getPageCount(){
        $sql = "select * from product";
        $state = $this->db->prepare($sql);
        $state->execute();
        $totalRows = $state->rowCount();
        return ceil($totalRows / Constants::LIMIT);
    }

    public function insertCategory(){

    }
}