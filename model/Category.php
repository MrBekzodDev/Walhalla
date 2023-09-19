<?php

namespace model;

use components\Constants;
use vendor\myframe\Connection;
use vendor\myframe\Model;
use PDO;

class Category extends Model
{


//    public function getList(){
//        $sql = "select * from category";
//        $state = $this->db->prepare($sql);
//        $state->execute();
//        return $state->fetchAll();
//    }

    public function addCategory($name){
        $sqlInsert = "insert into category (name) values (:name)";
        $state = $this->db->prepare($sqlInsert);
        $state->bindValue(":name",$name);
        $state->execute();
        if ($state->rowCount() === 0) {
            die("Error inserting data: " . $state->errorInfo()[1]);
        }
    }

    public function updateCategory($id, $name){
        $sqlUpdate = "update category set name = :name where id = :id";
        $state = $this->db->prepare($sqlUpdate);
        $state->bindValue(":id", $id, PDO::PARAM_INT);
        $state->bindValue("name", $name);
        $state->execute();
        header("Location: /category/list"); exit();
    }

    public function getCategoryList($page, $withoutLimit = false){
        $offset = ($page - 1) * Constants::LIMIT;

        if($withoutLimit){
            $sql = "select * from category";
            $state = $this->db->prepare($sql);
        }else{
            $sql = "select * from category limit :offset, :limit";
            $state = $this->db->prepare($sql);
            $state->bindValue(":limit", Constants::LIMIT, PDO::PARAM_INT);
            $state->bindValue(":offset", $offset, PDO::PARAM_INT);
        }
        $state->execute();
        $result = $state->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }
    public function deleteCategory($id){
        $sql = "delete from category where id=:id";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        header("Location: /category/list"); exit();
    }

    public function getPageCount(){
        $sql = "select * from category";
        $state = $this->db->prepare($sql);
        $state->execute();
        $totalRows = $state->rowCount();
        return ceil($totalRows / Constants::LIMIT);
    }
    public function getCategoryById($id){
        $sql = "select * from category where id = :id";
        $state = $this->db->prepare($sql);
        $state -> bindValue(":id", $id, PDO::PARAM_INT);
        $state->execute();
        return $state->fetch(PDO::FETCH_OBJ);
    }
}