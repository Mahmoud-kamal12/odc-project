<?php
session_start();
require_once 'core/config.php';


if (!isset($_SESSION['user'])){
    header("Location: " .URL . "login.php");
}else{
    header("Location: " .URL . "home.php");
}

?>


<?php require_once 'pages/inc/footer.php'; ?>

