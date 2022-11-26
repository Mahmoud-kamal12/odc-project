<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';
$errors = getFromSession(['error'] , 'categories');
?>


    <div style="text-align: center;margin: 15px 0">
        <h1>Add New Category</h1>
    </div>

    <div class="container">

        <?= showErrors($errors);?>

        <div class="row">
            <div class="col-8 mx-auto">
                <form action="<?php echo URL."controllers/categories/store.php" ?>" method="POST">
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-success" >
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>

