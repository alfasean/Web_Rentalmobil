<?php
session_start();
require_once "../koneksi.php";
if (!isset($_SESSION["admin"])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fitrah Rental Car</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <!-- Optional, Add fancyBox for media, buttons, thumbs -->
  <link rel="stylesheet" href="../assets/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="../assets/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css"
    media="screen" />
  <link rel="stylesheet" href="../assets/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css"
    media="screen" />
  <script type="text/javascript" src="../assets/fancybox/source/jquery.fancybox.pack.js"></script>
  <script type="text/javascript" src="../assets/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
  <script type="text/javascript" src="../assets/fancybox/source/helpers/jquery.fancybox-media.js"></script>
  <script type="text/javascript" src="../assets/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
  <!-- Optional, Add mousewheel effect -->
  <script type="text/javascript" src="../assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    * {
      font-family: "Poppins" !important;
    }

    body {
      margin-top: 40px;
      background-color: #fff;
    }

    .navbar {
      top: 0 !important;
      position:fixed;
      width: 100%;
      z-index: 1;
    }
    .navbar .container{
      padding:5px
    }

    footer {
  text-align: center;
  padding: 3px;
  background-color: #D8D8D8;
  color: #000;
  width: 100%;
  position: fixed !important;
  left: 0 !important;
  bottom: 0 !important;
}
footer p {
  font-size: 16px !important  ;
}

  </style>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">ADMIN | FITRAH RENTAL CAR</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Input <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?page=admin">Admin</a></li>
              <li><a href="?page=jenis">Jenis Mobil</a></li>
              <li><a href="?page=mobil">Mobil</a></li>
              <li><a href="?page=pelanggan">Pelanggan</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Laporan <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?page=lap_konfirmasi">Konfirmasi</a></li>
              <li><a href="?page=lap_perperiode">Penyewaan Perperiode</a></li>
            </ul>
          </li>
          <li><a href="logout.php">Logout</a></li>
          <li><a href="#">|</a></li>
          <li><a href="#" style="font-weight: bold; color: #6096B4;"><?= ucfirst($_SESSION["admin"]["username"]) ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row" style="margin-top:50px">
      <div class="col-md-12">
        <?php include adminPage($_ADMINPAGE); ?>
      </div>
    </div>
  </div>
  <footer><p style="padding: 20px;">Copyright © 2023 Fitrah Car Rental . All Rights Reserved.</footer>
  <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>