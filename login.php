<?php
session_start();
require_once 'core/config.php';
require_once 'helpers/helper.php';
require_once 'pages/inc/header.php';

if (isset($_SESSION['user'])){
    header("Location: " .URL . "home.php");
}

$error = getFromSession(['error'] , 'users');

?>


<div class="container text-center">
    <div class="row mt-5 w-50 m-auto">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Login Form
                </div>
                <div class="card-body">
                    <div class=" mx-auto">
                        <form action="<?php echo URL."controllers/auth/login.php" ?>" method="POST">

                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email"  class="form-control" id="email" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" id="password">
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn btn-success" >
                            </div>
                             <?php if(isset( $error['error'])){ ?>
                                <div class="mb-3">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error['error'] ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'pages/inc/footer.php'; ?>

