<?php

require_once '../../core/config.php';
require_once ROOT_PATH . 'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "GET"){

    $id = $_GET['id'];

    $row = getRow('orders',$id);

    if($row){
        $result = deleteRow("orders",$id);
        if($result){
            $_SESSION['orders'] = ['success' => "product deleted successfully"];
        }else{
            $_SESSION['orders'] = ['error' => mysqli_error($conn)];
        }
    }else{
        $_SESSION['orders'] = ['error' => 'product not found'];
    }

        header("Location: " . URL . "pages/orders/index.php");

}
