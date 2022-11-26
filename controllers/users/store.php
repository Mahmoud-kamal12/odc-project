<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];

    $data['image']        = uploadImage($_FILES['image'] , 'users');
    $data['name']         = $_POST['name'];
    $data['email']        = $_POST['email'];
    $data['password']     = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $data['type']  = $_POST['type'];


    $errors = validate(['name','email','password','type'] , $_POST);

    if ($_POST['password'] !== $_POST['password_confirm']){
        $errors = ['password not match'];
    }

    if (!empty($errors)){
        $_SESSION['users'] = ['error' => $errors];
        header("Location: " . URL . "pages/users/create.php");
        exit();
    }

    $result = insertAll($data , 'users');

    if($result){
        $_SESSION['users'] = ['success' => "user added successfully"];
    }else{
        $_SESSION['users'] = ['error' => mysqli_error($conn)];
    }

    header("Location: " . URL . "pages/users/index.php");

}

