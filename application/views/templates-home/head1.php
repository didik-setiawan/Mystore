<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title; ?></title>
  <link rel="icon" type="image/png" sizes="30X30" href="<?= base_url('assets/img/p.png'); ?>">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/mdb/'); ?>css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/mdb/'); ?>css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="<?= base_url('assets/mdb/'); ?>css/style.css">
  <!-- <link rel="stylesheet" href="<?= base_url('assets/mdb/'); ?>css/my.css"> -->
  <link rel="stylesheet" href="<?= base_url('assets/mdb/'); ?>fontawesome/css/all.min.css">
  
</head>
<body>

  <?php 
  $item = $this->cart->total_items();
  ?>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md navbar-light bg-white">

    <a class="navbar-brand" href="<?= base_url(); ?>">
      <img src="<?= base_url('assets/img/logo11.png') ?>">
    </a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav11"
    aria-controls="basicExampleNav11" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Links -->
  <div class="collapse navbar-collapse" id="basicExampleNav11">

    <!-- Right -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="<?= base_url('home/cart'); ?>" class="nav-link navbar-link-2 waves-effect">
          <?php if(empty($item)): ?>
            <span class="badge badge-pill red">0</span>
            <?php else: ?>
              <span class="badge badge-pill red"><?= $item; ?></span>
            <?php endif; ?>
            <i class="fas fa-shopping-cart pl-0"></i>
          </a>
        </li>

        <li class="nav-item">
          <a data-toggle="modal" data-target="#Modal2" class="nav-link waves-effect">
            <i class="fa fa-search"></i>
          </a>
        </li>
        <?php if(empty($user)): ?>
          <li class="nav-item">
            <a href="<?= base_url('login'); ?>" class="btn btn-info btn-md">
              Sign in
            </a>
          </li>

          <li class="nav-item pl-2 mb-2 mb-md-0">
            <a href="<?= base_url('login/register'); ?>" type="button"
              class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">Sign up</a>
            </li>
            <?php else: ?>
              <li class="nav-item avatar dropdown">
                <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?= base_url('assets/img/') . $user['img']; ?>" class="rounded-circle z-depth-0" height="40px" width="40px">
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
                  <a class="dropdown-item" href="<?= base_url('home/profile'); ?>"><i class="fa fa-user"></i> <?= $user['nama']; ?></a>
                  <a href="<?= base_url('home/pesanan'); ?>" class="dropdown-item"><i class="fa fa-box"></i>  Pesanan</a>
                  <a href="<?= base_url('home/edit_profile'); ?>" class="dropdown-item"><i class=" fas fa-wrench"></i> Settings</a>
                  <a href="<?= base_url('home/logout'); ?>" class="dropdown-item"><i class=" fas fa-angle-double-right"></i> Logout</a>
                </div>
              </li>
            <?php endif; ?>
          </ul>

        </div>
        <!-- Links -->

      </nav>
      <!-- Navbar -->

      <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <form action="<?= base_url('home'); ?>" method="post">
              <div class="modal-body">
                <input type="text" name="cari" id="cari" placeholder="Cari di sini..." class="form-control" autocomplete="off">
              </div>
            </form>
          </div>
        </div>
      </div>