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
        <li class="nav-item">
          <a class="nav-link" href="<?= checkAdmin() ? URL ."pages/categories/index.php":''?>">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= checkAdmin() ? URL ."pages/categories/create.php":''?>">Add Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= URL . "pages/products/index.php"?>">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= checkAdmin() ? URL ."pages/products/create.php":'';?>">Add Product</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= checkAdmin() ? URL . "pages/users/index.php":'';?>">Users</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= checkAdmin() ? URL . "pages/users/create.php":'' ?>">Add User</a>
        </li>

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
