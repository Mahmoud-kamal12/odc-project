<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id = $_GET['id'];
    $errors = [];
    $row = getRow("products",$id);

    if ($row){

        $data['image']        = uploadImage($_FILES['image'] , 'products' , $row['image'] ,true);
        $data['name']         = $_POST['name'];
        $data['price']        = $_POST['price'];
        $data['category_id']  = $_POST['category_id'];
        $data['description']  = $_POST['description'];

        $errors = validate(['name','price','category_id','description'] , $_POST);

        if (!empty($errors)){
            $_SESSION['products'] = ['error' => $errors];
            header("Location: " . URL . "pages/products/edit.php?id=".$id);
            exit();
        }

        $result = updateAll($data,'products',$id );

        if($result){
            $_SESSION['products'] = ['success' => "product added successfully"];
        }else{
            $_SESSION['products'] = ['error' => mysqli_error($conn)];
        }

    }
    else{
        $_SESSION['products'] = ['error' => 'product not found'];
    }
    header("Location: " . URL . "pages/products/index.php");
}
