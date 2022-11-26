<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';
$folder = 'products';

$id     = $_GET['id'];
$row    = getRow("orders",$id);
$clients = selectWhere("users" , "type = '2'" );
$products = selectAll("products");
$myProducts = selectWhere("order_items" , "order_id = '{$id}'");
$result = getRow("orders" , $id);
$errors = getFromSession(['error'] , 'orders');
?>



    <div style="text-align: center;margin: 15px 0">
        <h1>Edit Order</h1>
    </div>


<div class="container">

        <?= showErrors($errors);?>


        <div class="row">
        <div class="col mx-auto">
            <form action="<?=  URL . "controllers/orders/update.php?id={$id}" ?>" method="POST" enctype="multipart/form-data">


                <div class="mb-3">
                    <label for="">Client</label>
                    <select name="client_id" class="form-control select2">
                        <?php while($row = mysqli_fetch_assoc($clients)): ?>
                            <option value="<?php echo $row['id']; ?>" <?= $row['id'] == $result['client_id']?'selected':''?> ><?php echo $row['name']; ?></option>
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

                                <tbody id="card-shop-body">
                                <?php
                                    foreach ($myProducts as $product){
                                    echo <<< END
                                    <tr>
                                        <td><input type="text" value="{$product['product_id']}" name="products[{$product['id']}][id]" readonly style="width: 50px;border: none;"></td>
                                        <td><input type="text" value="{$product['product_name']}" name="products[{$product['id']}][name]" readonly style="width: 50px;border: none;"></td>
                                        <td><input type="text" value="{$product['product_price']}" name="products[{$product['id']}][price]" readonly style="width: 50px;border: none;"></td>
                                        <td><input type="number" value="{$product['product_quantity']}" name="products[{$product['id']}][quantity]" style="width: 50px;"></td>
                                        <th class="delete-row" style="color:red;cursor:pointer">X</th>
                                    </tr>
                                    END;
                                    }
                                ?>
                                </tbody>
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

