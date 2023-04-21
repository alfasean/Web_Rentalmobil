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

    .navbar .container {
        padding: 5px
    }

    footer {
        text-align: center;
        padding: 3px;
        background-color: #D8D8D8;
        color: #000;
        margin-top: 50px
    }

    footer p {
        font-size: 14px !important;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitrah Rental Car</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
                <a class="navbar-brand" href="#">Fitrah Rental Car</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
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

    <footer>
        <p style="padding: 20px;">Copyright © 2023 Fitrah Car Rental . All Rights Reserved.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</body>
</body>

</html>