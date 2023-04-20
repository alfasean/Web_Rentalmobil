<?php
session_start();
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

* {
    font-family: "Poppins" !important;
}

body {
    background-color: #F0F0F0 !important;
}

.navbar {
    top: 0 !important;
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
  margin-top:50px
}
footer p {
  font-size: 16px !important  ;
}
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitrah Rental Car</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Optional, Add fancyBox for media, buttons, thumbs -->
    <link rel="stylesheet" href="assets/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css"
        media="screen" />
    <link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css"
        media="screen" />
    <script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
    <!-- Optional, Add mousewheel effect -->
    <script type="text/javascript" src="assets/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Fitrah Rental Car</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?page=home">Beranda <span class="sr-only">(current)</span></a></li>
                    <?php if (isset($_SESSION["pelanggan"])): ?>
                    <li><a href="?page=profil">Profil</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="#">|</a></li>
                    <li><a href="#"
                            style="font-weight: bold; color: #6096B4;"><?= ucfirst($_SESSION["pelanggan"]["username"]) ?></a>
                    </li>
                    <?php else: ?>
                    <li><a href="?page=daftar">Daftar</a></li>
                    <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include page($_PAGE); ?>
            </div>
        </div>
    </div>

    <footer><p style="padding: 20px;">Copyright © 2023 Fitrah Car Rental . All Rights Reserved.</footer>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</body>

</html>