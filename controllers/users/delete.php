<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';

if($_SERVER['REQUEST_METHOD'] == "GET"){

    $id = $_GET['id'];
    $row = getRow('users',$id);
    if ($row){
        $result = deleteRow("products",$id);
        $result = deleteRow("categories",$id);
        if($result){
            deleteImage($row['image'],'users');
            $_SESSION['users'] = ['success' => "user deleted successfully"];
        }else{
            $_SESSION['products'] = ['error' => mysqli_error($conn)];
        }
    }else{
        $_SESSION['users'] = ['error' => 'user not found'];
    }
    header("Location: " . URL . "pages/users/index.php");


}
