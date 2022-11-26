<?php
require_once 'core/config.php';
require_once 'core/conn.php';
require_once 'pages/inc/header.php';
require_once 'pages/inc/nav.php';

?>

<div class="container">

    <div class="row mt-5">
        <div class="col text-center">
            <h1>Home Page</h1>
        </div>
    </div>

    <div class="row">
        <div class="col text-left">
            <h4>User Name : <?= $_SESSION['user']['name'] ?></h4>
            <h4>User E-Mail : <?= $_SESSION['user']['email'] ?></h4>
            <h4>User Type : <?= $_SESSION['user']['email'] == 1 ? "admin" : "user";  ?></h4>
        </div>
    </div>

</div>

<?php require_once 'pages/inc/footer.php'; ?>

