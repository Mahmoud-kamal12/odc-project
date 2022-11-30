<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';

$pagename = 'orders';
$folder = "products";
$clients = selectWhere("users" , "type = '2'" );
$products = selectAll("products");
$errors = getFromSession(['error'] , 'orders');

?>


<div class="wrapper">

    <?php include ROOT_PATH . 'pages/inc/nav.php';?>

    <?php include ROOT_PATH .'pages/inc/aside.php';?>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= URL ."index.php"?>">Home</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                <?= showErrors($errors);?>

                <div class="row">
                    <div class="col mx-auto">
                        <form action="<?=  URL . "controllers/orders/store.php" ?>" method="POST" enctype="multipart/form-data">

                            <div class="mb-3 mt-5">
                                <input type="submit" class="form-control bg-success" >
                            </div>

                            <div class="mb-3">
                                <label for="">Client</label>
                                <select name="client_id" class="form-control select2">
                                    <?php while($row = mysqli_fetch_assoc($clients)): ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>


                            <div class=" row overflow-hidden" style="height: 470px">

                                <div class="col col-6  border border-primary py-3  overflow-auto" style="height: 100%">
                                    <div class="row">

                                        <?php
                                        while ($product = mysqli_fetch_assoc($products)){

                                            $src = ASSET . $folder . '/' . $product['image'];
                                            echo'<div class="col col-4 mb-3">';
                                            echo '<div class="card">';
                                            echo "<img src='{$src}' class='card-img-top'  width='100' height='100'>";
                                            echo "<div class='card-body'>";
                                            echo"<h5 class='card-title'>{$product['name']}</h5>";
                                            echo "<h6 class='card-subtitle mb-2 text-muted'>{$product['description']}</h6>";
                                            echo "<p class='btn btn-primary add-to-card' data-idd='{$product['id']}' data-price='{$product['price']}' data-name='{$product['name']}'>{$product['price']} $</p>";
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';

                                        }

                                        ?>

                                    </div>
                                </div>

                                <div class="col col-6  border border-success py-3 overflow-auto"  style="height: 100%">
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th style="color:red;cursor:pointer" id="delete-all-row">X</th>
                                            </tr>
                                            </thead>

                                            <tbody id="card-shop-body"> </tbody>
                                        </table>
                                    </div>
                                </div>

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

