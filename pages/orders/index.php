<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH . 'pages/inc/header.php';
require_once ROOT_PATH . 'pages/inc/nav.php';

$sql = "SELECT orders.* , cleint.name as client_name , user.name as user_name  FROM `orders`
INNER JOIN users as cleint on cleint.id = orders.client_id
INNER JOIN users as user on  user.id = orders.user_id";

$result = mysqli_query($conn,$sql);


$resultSession = getFromSession(['success' , 'error'] , 'orders');
$success = $resultSession['success'] ?? [];
$error = $resultSession['error'] ?? [];

?>


    <div style="text-align: center;margin: 15px 0">
        <h1>Orders  Page</h1>
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
                            <th>Client</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['client_name']; ?></td>
                            <td><?= $row['user_name']; ?> </td>
                            <td><?= $row['total']; ?> $</td>

                            <td>
                                <a href="<?= URL."pages/orders/edit.php?id=".$row['id']; ?>" class="btn btn-info">Edit</a>
                            </td>

                            <td>
                                <a href="<?= URL."controllers/orders/delete.php?id=".$row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>
