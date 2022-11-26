<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH . 'pages/inc/header.php';
require_once ROOT_PATH . 'pages/inc/nav.php';
$folder = 'products';

$sql = "SELECT *, products.id AS prod_id , categories.id AS cat_id, products.name AS prod_name , categories.name AS cat_name 
        FROM `products` INNER JOIN `categories` ON `categories`.`id` = `products`.`category_id` ";

$result = mysqli_query($conn,$sql);

$resultSession = getFromSession(['success' , 'error'] , 'products');
$success = $resultSession['success'] ?? [];
$error = $resultSession['error'] ?? [];

?>


    <div style="text-align: center;margin: 15px 0">
        <h1>Products  Page</h1>
    </div>

    <div class="container">

        <?php
            if($success){
                echo '<div class="row">';
                echo "<div class='alert alert-success' role='alert'>{$success}</div>";
                echo '</div>';
            }

            if($error){
                echo '<div class="row">';
                echo "<div class='alert alert-danger' role='alert'>{$error}</div>";
                echo '</div>';
            }
        ?>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>price</th>
                            <th>category</th>
                            <th>image</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['prod_name']; ?></td>
                            <td><?= $row['price']; ?> $</td>
                            <td><?= $row['cat_name']; ?></td>
                            <td><img class='img-thumbnail' width="100" height="100" src="<?= ASSET . $folder. '/' . $row['image']; ?>"></td>
                            <td>
                                <a href="<?= URL."pages/products/edit.php?id=".$row['prod_id']; ?>" class="btn btn-info">Edit</a>
                            </td>

                            <td>
                                <a href="<?= checkAdmin()? URL."controllers/products/delete.php?id=".$row['prod_id']:''; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>
