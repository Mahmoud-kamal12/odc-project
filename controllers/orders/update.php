<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
    $total = 0;
    $order = [];
    $id     = $_GET['id'];


    $conn->autocommit(FALSE);

    $data['client_id']         = $_POST['client_id'];
    $data['user_id']           = $_SESSION['user']['id'];

    $products  = $_POST['products'];

    $errors = validate(['products','client_id'] , $_POST);

    if (!empty($errors)){
        $_SESSION['orders'] = ['error' => $errors];
        header("Location: " . URL . "pages/orders/create.php");
        exit();
    }

    if (!updateAll($data,'orders' , $id)){
        $_SESSION['orders'] = ['error' => mysqli_error($conn)];
    }

    $sql = "SELECT id FROM `order_items` WHERE order_id = '{$id}'";
    $result = mysqli_query($conn,$sql);
    deleteMultiRow('order_items' , $result->fetch_all());
    $conn->commit();
    foreach ($products as $product){
        $productI['product_id'] = (int)$product['id'];
        $productI['order_id'] = $id;
        $productI['product_name'] = $product['name'];
        $productI['product_price'] = (int)$product['price'];
        $productI['product_quantity'] = (int)$product['quantity'];
        $total +=  (int)$product['price'] * (int)$product['quantity'];
        $insertedRow = insertAll($productI,'order_items');
        if (!$insertedRow){
            $_SESSION['orders'] = ['error' => mysqli_error($conn)];
            $conn->rollback();
            header("Location: " . URL . "pages/orders/index.php");
            exit();
        }
    }


    $result = updateAll(['total' => $total],'orders' , $id) ;

    if($result){
        $_SESSION['orders'] = ['success' => "product added successfully"];
        $conn->commit();
    }else{
        $_SESSION['orders'] = ['error' => mysqli_error($conn)];
        $conn->rollback();
    }

    header("Location: " . URL . "pages/orders/index.php");
}
