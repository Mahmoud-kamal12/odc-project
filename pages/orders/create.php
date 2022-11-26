<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';

$clients = selectWhere("users" , "type = '2'" );
$products = selectAll("products" );
$errors = getFromSession(['error'] , 'orders');

?>


    <div style="text-align: center;margin: 15px 0">
        <h1>Add New Order</h1>
    </div>


    <div class="container">

        <?= showErrors($errors);?>

        <div class="row">
            <div class="col mx-auto">
                <form action="<?=  URL . "controllers/orders/store.php" ?>" method="POST" enctype="multipart/form-data">


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
//                                for ($i = 0;$i<100;$i++){
                                    foreach ($products as $product){
                                        echo <<< END
                                            <div class="col col-4 mb-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{$product['name']}</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">{$product['description']}</h6>
                                                        <p class="card-subtitle mb-2 text-muted">{$product['price']} $</p>
                                                        <p class="btn btn-primary add-to-card" data-idd="{$product['id']}" data-price="{$product['price']}" data-name="{$product['name']}">Add</p>
                                                    </div>
                                                </div>
                                            </div>
                                        END;
                                    }
//                                }

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

                    <div class="mb-3 mt-5">
                        <input type="submit" class="form-control bg-success" >
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>

