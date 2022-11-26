<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){


    $data['name'] = $_POST['name'];
    $errors = validate(['name'] , $_POST);
    if (!empty($errors)){
        $_SESSION['categories'] = ['error' => $errors];
        header("Location: " . URL . "pages/categories/create.php");
        exit();
    }

    $result = insertAll($data , 'categories');

    if($result){
        $_SESSION['categories'] = ['success' => "product added successfully"];
    }else{
        $_SESSION['categories'] = ['error' => mysqli_error($conn)];
    }

    header("Location: " . URL . "pages/categories/index.php");

}

