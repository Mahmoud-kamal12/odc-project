<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';
$result = selectAll("categories");
$resultSession = getFromSession(['success' , 'error'] , 'categories');
$success = $resultSession['success'] ?? [];
$error = $resultSession['error'] ?? [];


?>

    <div style="text-align: center;margin: 15px 0">
        <h1>Categories  Page</h1>
    </div>

    <div class="container mt-3">

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
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <a href="<?php echo URL."pages/categories/edit.php?id=".$row['id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo URL."controllers/categories/delete.php?id=".$row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>
