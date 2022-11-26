<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';

$errors = getFromSession(['error'] , 'users');
$result = selectAll("categories");

?>


    <div style="text-align: center;margin: 15px 0">
        <h1>Add New User</h1>
    </div>

    <div class="container">

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

<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>

