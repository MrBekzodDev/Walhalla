<?php

namespace controllers;



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
        $pageQuantity = $product -> getProductList($page);
        $pageCount = $product -> getPageCount();
        $currentPage = 1;
        $this->view ->render("product/list", [
            "list" => $pageQuantity,
            "pageCount"=>$pageCount,
            "currentPage"=>$currentPage
        ]);
    }
    public function add(){
        if(isset($_POST)){
            $category = new Product();
            $category->addProduct($_POST['productName', 'categoryName', 'productDescription']);
        }
        $this->view ->render("product/add");
    }
    public function update($id){

        $this->view ->render("product/update");
    }

    public function delete(){

        $this->view ->render("product/delete");
    }

}