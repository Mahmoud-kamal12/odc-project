<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id = $_GET['id'];
    $errors = [];
    $row = getRow("users",$id);

    if ($row){

        $data['image']        = uploadImage($_FILES['image'] , 'users' , $row['image'] ,true);
        $data['name']         = $_POST['name'];
        $data['email']        = $_POST['email'];
        if ($data['password'] && $_POST['password_confirm'])
            $data['password']     = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $data['type']  = $_POST['type'];


        $errors = validate(['name','email','type'] , $_POST);

        if ($_POST['password'] !== $_POST['password_confirm']){
            $errors = ['password not match'];
        }

        if (!empty($errors)){
            $_SESSION['users'] = ['error' => $errors];
            header("Location: " . URL . "pages/users/edit.php?id=".$id);
            exit();
        }

        $result = updateAll($data,'users',$id);

        if($result){
            $_SESSION['users'] = ['success' => "user added successfully"];
        }else{
            $_SESSION['users'] = ['error' => mysqli_error($conn)];
        }

    }
    else{
        $_SESSION['users'] = ['error' => 'user not found'];
    }
    header("Location: " . URL . "pages/users/index.php");

}
