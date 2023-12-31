<?php

namespace controllers;



use model\Category;
use model\Product;
use vendor\myframe\Connection;
use vendor\myframe\Controller;
use vendor\myframe\Views;

class ProductController extends Controller
{
    public function list(){
        $product = new Product();
        $page =1;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $result = $product -> getProductList($page);
        $pageCount = $product -> getPageCount();
        $currentPage = 1;
        $this->view ->render("product/list", [
            "list" => $result,
            "pageCount"=>$pageCount,
            "currentPage"=>$currentPage
        ]);
    }
    public function add(){
        if(isset($_POST)){
            $category = new Product();
    #        $category->addProduct($_POST[ 'productName', 'categoryName', 'productDescription']);
        }
        $this->view ->render("product/add");
    }
    public function update($id){

        $this->view ->render("product/update");
    }

    public function delete(){

        $this->view ->render("product/delete");

        $file = 'path/to/file.txt';

        if (file_exists($file)) {
            if (unlink($file)) {
                echo 'File deleted successfully.';
            } else {
                echo 'Unable to delete the file.';
            }
        } else {
            echo 'File does not exist.';
        }

    }

    public function comment(){
        $this->view ->render("product/comment");
    }

}

echo "addcoment function";





