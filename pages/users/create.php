<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';

$pagename = 'users';
$errors = getFromSession(['error'] , 'users');
$result = selectAll("categories");

?>

<div class="wrapper">

    <?php include ROOT_PATH . 'pages/inc/nav.php';?>

    <?php include ROOT_PATH .'pages/inc/aside.php';?>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= URL ."index.php"?>">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                <?= showErrors($errors);?>

                <div class="row">
                    <div class="col-8 mx-auto">
                        <form action="<?php echo URL."controllers/users/store.php" ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for=""> Name</label>
                                <input type="text" name="name" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label for=""> Email</label>
                                <input type="email" name="email" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for=""> Password</label>
                                <input type="password" name="password" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirm" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label for="">Type</label>
                                <select name="type" class="form-control">
                                    <option value="0">user</option>
                                    <option value="1">admin</option>
                                    <option value="2">client</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for=""> Image</label>
                                <input type="file" name="image" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="form-control bg-success" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2022-2023 <a href="">Mahmoud Kamal</a></strong>
    </footer>

</div>


<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>

