<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= URL . 'home.php'?>" class="brand-link">
      <span class="brand-text font-weight-light">ODC EraaSoft</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= URL."assets/dist/img/user2-160x160.jpg"?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= URL ."index.php"?>" class="d-block"><?= $_SESSION['user']['name'] ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item ">
                <a href="<?= URL . 'home.php'?>" class="nav-link <?= isset($pagename) && $pagename == "home" ? 'active' : ''?>">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>

            <li class="nav-item <?= isset($pagename) && $pagename == "users" ? 'menu-open' : ''?>">
                <a href="#" class="nav-link <?= isset($pagename) && $pagename == "users" ? 'active' : ''?> ">
                    <i class="nav-icon fas fa-user-alt "></i>
                    <p> Users <i class="right fas fa-angle-left"> </i></p>
                </a>
                <ul class="nav nav-treeview">
                    <?= printLi("pages/users/index.php" , "Users" , 'fas fa-user ') ?>
                    <?= printLi("pages/users/create.php" , "Add Users" , 'fas fa-plus-circle') ?>
                </ul>
            </li>

            <li class="nav-item <?= isset($pagename) && $pagename == "products" ? 'menu-open' : ''?>">
                <a href="#" class="nav-link <?= isset($pagename) && $pagename == "products" ? 'active' : ''?>">
                    <i class="nav-icon fas fa-truck-loading "></i>
                    <p> Products <i class="right fas fa-angle-left"> </i></p>
                </a>
                <ul class="nav nav-treeview">
                    <?= printLi("pages/products/index.php" , "Products" , 'fas fa-truck' , true) ?>
                    <?= printLi("pages/products/create.php" , 'Add Product','fas fa-plus-circle') ?>
                </ul>
            </li>

            <li class="nav-item <?= isset($pagename) && $pagename == "categories" ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link <?= isset($pagename) && $pagename == "categories" ? 'active' : ''?>">
                        <i class="nav-icon fas fa-cubes "></i>
                        <p> Categories <i class="right fas fa-angle-left"> </i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?= printLi("pages/categories/index.php" , "Categories" , 'fas fa-cube') ?>
                        <?= printLi("pages/categories/create.php" , "Add Categories" , 'fas fa-plus-circle') ?>
                    </ul>
                </li>

            <li class="nav-item <?= isset($pagename) && $pagename == "orders" ? 'menu-open' : ''?>">
                    <a href="#" class="nav-link <?= isset($pagename) && $pagename == "orders" ? 'active' : ''?>">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p> Orders <i class="right fas fa-angle-left"> </i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?= printLi("pages/orders/index.php" , "Orders" , 'fas fa-shopping-cart') ?>
                        <?= printLi("pages/orders/create.php" , "Add Order" , 'fas fa-plus-circle') ?>
                    </ul>
                </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
