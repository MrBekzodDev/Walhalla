<?php

namespace controllers;


use model\Category;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use vendor\myframe\Controller;
use vendor\myframe\Views;
use vendor\myframe\Connection;

class CategoryController extends Controller
{

    public function list(){
        $category = new Category();
        $page =1;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $result = $category -> getCategoryList($page);
        $pageCount = $category -> getPageCount();
        $currentPage = 1;
        $this->view ->render("category/list", [
            "list" => $result,
            "pageCount"=>$pageCount,
            "currentPage"=>$currentPage
            ]);
    }
    public function add(){
        if(isset($_POST)){
            $category = new Category();
            $category->addCategory($_POST['categoryName']);

        }
        $this->view ->render("category/add");
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('users/login.php');
    }
    public function update($id){
        if(isset($_POST['categoryName'])){
            $category = new Category();
            $category->updateCategory($id, $_POST['categoryName']);
//            header("Location: /category/list"); exit();
        }
        $category = new Category();
        $result = $category->getCategoryById($id);
        $this->view ->render("category/update", ["category"=>$result]);
    }

    public function delete($id){
        if(isset($_GET['id'])) {
            $id = $_GET['id'];   //id = 15;
        }
        $category = new Category();
        $category->deleteCategory($id);
//        $this->view ->render("category/delete").$id;
    }
}