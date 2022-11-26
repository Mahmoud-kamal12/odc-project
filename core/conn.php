<?php
session_start();
require_once (ROOT_PATH.'helpers/helper.php');

$conn = mysqli_connect("localhost","root","","odc_crad");

if(!$conn){ 
    die("connection error : ");
}

if (!isset($_SESSION['user'])){
    header("Location: " .URL . "login.php");
}

