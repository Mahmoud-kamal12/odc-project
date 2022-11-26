<?php

require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email = '".$email."'";
    $rs = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($rs);

    if($numRows  == 1){
        $row = mysqli_fetch_assoc($rs);
        if(password_verify($password,$row['password'])){
            $_SESSION['user'] = $row;
            header("Location: " .URL . "home.php");
        }
        else{
            $_SESSION['users'] = ['error' => 'error in password'];
            header("Location: " .URL . "login.php");
        }
    }
    else{
        $_SESSION['users'] = ['error' => 'user not found'];
        header("Location: " .URL . "login.php");
    }

}

