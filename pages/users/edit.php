<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';
$folder = 'users';
$id = $_GET['id'];
$row = getRow("users",$id);
$errors = getFromSession(['error'] , 'users');

?>


    <div style="text-align: center;margin: 15px 0">
        <h1>Edit User</h1>
    </div>


<div class="container">

        <?= showErrors($errors);?>

        <div class="row">
            <div class="col-8 mx-auto">
                <form action="<?php echo URL."controllers/users/update.php?id=".$id ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for=""> Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $row['name']?>">
                    </div>

                    <div class="mb-3">
                        <label for=""> Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $row['email']?>">
                    </div>
                    <div class="mb-3">
                        <label for=""> Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirm" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            <option value="0" <?= ($row['type'] == 0 ? 'selected':'')?> >user</option>
                            <option value="1" <?= ($row['type'] == 1 ? 'selected':'')?> >admin</option>
                            <option value="2" <?= ($row['type'] == 2 ? 'selected':'')?> >client</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <img class='img-thumbnail' width="200" height="200" src="<?= ASSET . $folder. '/' . $row['image']; ?>">
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

