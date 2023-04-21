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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="../assets/js/jquery.min.js"></script>
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
      position: fixed;
      width: 100%;
      z-index: 1;
    }

    .navbar .container {
      padding: 5px
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="?page=home">Fitrah Rental Car</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  </script>
</body>

</html>