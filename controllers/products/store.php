<?php

require_once '../../core/config.php';
require_once ROOT_PATH . 'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];

    $data['image']        = uploadImage($_FILES['image'] , 'products');
    $data['name']         = $_POST['name'];
    $data['price']        = $_POST['price'];
    $data['category_id']  = $_POST['category_id'];
    $data['description']  = $_POST['description'];

    $errors = validate(['name','price','category_id','description'] , $_POST);

    if (!empty($errors)){
        $_SESSION['products'] = ['error' => $errors];
        header("Location: " . URL . "pages/products/create.php");
        exit();
    }

    $result = insertAll($data , 'products');

    if($result){
        $_SESSION['products'] = ['success' => "product added successfully"];
    }else{
        $_SESSION['products'] = ['error' => mysqli_error($conn)];
    }

    header("Location: " . URL . "pages/products/index.php");
}

