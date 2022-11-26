<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id = $_GET['id'];
    $row = getRow("categories",$id);

    if($row){
        $data['name'] = $_POST['name'];
        $errors = validate(['name'] , $_POST);
        if (!empty($errors)){
            $_SESSION['categories'] = ['error' => $errors];
            header("Location: " . URL . "pages/categories/edit.php?id=".$id);
            exit();
        }
        $result = updateAll($data , 'categories' ,$id);
        if($result){
            $_SESSION['categories'] = ['success' => "product updated successfully"];
        }else{
            $_SESSION['categories'] = ['error' => mysqli_error($conn)];
        }
        header("Location: " . URL . "pages/categories/index.php");

    }
    else{
        $_SESSION['categories'] = ['error' => 'category not found'];
    }
    header("Location: " . URL . "pages/categories/index.php");

}
