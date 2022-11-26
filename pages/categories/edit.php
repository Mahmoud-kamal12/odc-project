<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';
$id = $_GET['id'];
$row = getRow("categories",$id);
$errors = getFromSession(['error'] , 'categories');
?>

    <h1>Edit Category</h1>

    <div class="container">

        <?= showErrors($errors);?>

        <div class="row">
            <div class="col-8 mx-auto">
                <form action="<?php echo URL."controllers/categories/update.php?id=".$id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" value="<?php echo  $row['name']; ?>" name="name" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-success" >
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>

