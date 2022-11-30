<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= URL ."index.php"?>">Home</a>
          </li>
  
  
            <?= printLi("pages/categories/index.php" , "Categories") ?>
  
            <?= printLi("pages/categories/create.php" , "Add Categories") ?>
  
            <?= printLi("pages/products/index.php" , "Products" , true) ?>
  
            <?= printLi("pages/products/create.php" , "Add Products") ?>
  
            <?= printLi("pages/users/index.php" , "Users") ?>
  
            <?= printLi("pages/users/create.php" , "Add Users") ?>
  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL?>pages/orders/index.php">Orders</a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL?>pages/orders/create.php">Add Order</a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URL?>controllers/auth/logout.php">logout</a>
          </li>
  
        </ul>
        
      </div>
    </div>
  </nav>
  