<?php

require_once '../../core/config.php';
require_once ROOT_PATH . 'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "GET"){

    $id = $_GET['id'];

    $row = getRow('products',$id);

    if($row){
        $result = deleteRow("products",$id);
        if($result){
            deleteImage($row['image'],'products');
            $_SESSION['products'] = ['success' => "product deleted successfully"];
        }else{
            $_SESSION['products'] = ['error' => mysqli_error($conn)];
        }
    }else{
        $_SESSION['products'] = ['error' => 'product not found'];
    }

        header("Location: " . URL . "pages/products/index.php");

}
