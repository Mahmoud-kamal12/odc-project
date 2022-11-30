<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';
require_once ROOT_PATH.'pages/inc/header.php';

$pagename = 'products';

$result = selectAll("categories"); 
$errors = getFromSession(['error'] , 'products');
?>


<div class="wrapper">

    <?php include ROOT_PATH . 'pages/inc/nav.php';?>

    <?php include ROOT_PATH .'pages/inc/aside.php';?>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= URL ."index.php"?>">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                <?= showErrors($errors);?>

                <div class="row">
                    <div class="col-8 mx-auto">
                        <form action="<?php echo URL."controllers/products/store.php" ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <select name="category_id" class="form-control">
                                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Product Price</label>
                                <input type="number" name="price" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="">Product Decription</label>
                                <textarea name="description" class="form-control" rows="5"></textarea>
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
        </section>

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2022-2023 <a href="">Mahmoud Kamal</a></strong>
    </footer>

</div>

<?php require_once ROOT_PATH.'pages/inc/footer.php'; ?>

