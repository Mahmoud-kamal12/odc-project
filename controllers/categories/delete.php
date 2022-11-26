<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "GET"){

    $id = $_GET['id'];
    $row = getRow('categories',$id);
    if($row){
        $result = deleteRow("categories",$id);
        if($result){
            $_SESSION['categories'] = ['success' => "Category deleted successfully"];
        }else{
            $_SESSION['categories'] = ['error' => mysqli_error($conn)];
        }
    }else{
        $_SESSION['categories'] = ['error' => 'category not found'];
    }
    header("Location: " . URL . "pages/categories/index.php");
}

