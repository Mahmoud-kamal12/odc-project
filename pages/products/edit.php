<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';
$folder = 'products';

$id     = $_GET['id'];
$row    = getRow("products",$id);
$result = selectAll("categories");
$errors = getFromSession(['error'] , 'products');
?>



    <div style="text-align: center;margin: 15px 0">
        <h1>Edit Product</h1>
    </div>


<div class="container">

        <?= showErrors($errors);?>


        <div class="row">
            <div class="col-8 mx-auto">
            <form action="<?= URL."controllers/products/update.php?id=".$id?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <input value="<?= $row['name']?>" type="text" name="name" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <select name="category_id" class="form-control">
                            <?php while($row2 = mysqli_fetch_assoc($result)): ?>
                                <option value="<?= $row2['id']; ?>" <?= $row2['id'] == $row['category_id'] ? "selected" : ''; ?>><?= $row2['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Product Price</label>
                        <input value="<?= $row['price']?>" type="number" name="price" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="">Product Decription</label>
                        <textarea name="description" class="form-control" rows="5"><?= $row['description']?></textarea>
                    </div>
                                
                    <div class="mb-3">
                    <img class='img-thumbnail' width="200" height="200" src="<?= ASSET . $folder. '/' . $row['image']; ?>">
                    </div>


                    <div class="mb-3">
                        <label for="">Product Image</label>
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

