<?php
require_once 'core/config.php';
require_once 'core/conn.php';
include 'pages/inc/header.php';

$pagename = 'home';

?>

<div class="wrapper">
 
    <?php include 'pages/inc/nav.php';?>

    <?php include 'pages/inc/aside.php';?>

<div class="content-wrapper">

  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= URL ."index.php"?>">Home</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">

      </div>
    </section>

  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="">Mahmoud Kamal</a></strong>
  </footer>

</div>

<?php require_once 'pages/inc/footer.php'; ?>

