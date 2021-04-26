<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/logo.png" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <style>
    .login {
      margin-bottom: 5px;
    }
    .cursor-pointer{
      cursor:pointer !important;
    }
    .dropmenu-login {
      width: 200px !important;
    }
  </style>
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <a href="index3.html" class="navbar-brand">
      <img src="assets/ico.png" alt="FOSSBAT Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">FOSSBAT</span>
    </a>
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Jadwal Pertandingan</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Lokasi Pertandingan</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Galeri</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Hubungi Kami</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->
        <?php if(!isset($_SESSION['username'])){ ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle cursor-pointer" data-toggle="dropdown">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu p-3 dropmenu-login">
            <form class="form-horizontal" method="post" accept-charset="UTF-8">
              <input class="form-control login" type="text" name="username2" placeholder="Username">
              <input class="form-control login" type="text" name="password2" placeholder="Password">
              <input class="btn btn-primary" type="button" name="submit" value="Login">
              <p id="alert-login"></p>
            </form>
          </div>
        </li>
        <?php } ?>
        <!-- Navbar Search -->
        <li class="nav-item">
          <!-- SEARCH FORM -->
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->