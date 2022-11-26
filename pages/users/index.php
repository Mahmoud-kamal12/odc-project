<?php
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';
require_once ROOT_PATH.'pages/inc/nav.php';
$folder = 'users';
$result = selectAll("users");
$resultSession = getFromSession(['success' , 'error'] , 'users');
$success = $resultSession['success'] ?? [];
$error = $resultSession['error'] ?? [];
?>






    <div style="text-align: center;margin: 15px 0">
        <h1>Users  Page</h1>
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
                            <th>email</th>
                            <th>type</th>
                            <th>image</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= getUserType($row['type']);?> </td>
                            <td>
                                <img src="<?= ASSET . $folder. '/' . $row['image']; ?>" width="100" height="100">
                            </td>
                            <td>
                                <a href="<?php echo URL."pages/users/edit.php?id=".$row['id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo URL."controllers/users/delete.php?id=".$row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>
