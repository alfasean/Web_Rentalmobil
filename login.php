<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "koneksi.php";
    $sql = "SELECT * FROM pelanggan WHERE username='$_POST[username]' AND password='" . md5($_POST['password']) . "'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
                $_SESSION["pelanggan"]["is_logged"] = true;
                $_SESSION["pelanggan"]["id"] = $data["id_pelanggan"];
                $_SESSION["pelanggan"]["username"] = $data["username"];
                $_SESSION["pelanggan"]["nama"] = $data["nama"];
                $_SESSION["pelanggan"]["no_ktp"] = $data["no_ktp"];
                $_SESSION["pelanggan"]["no_telp"] = $data["no_telp"];
                $_SESSION["pelanggan"]["email"] = $data["email"];
                $_SESSION["pelanggan"]["alamat"] = $data["alamat"];
              }
            header('location: index.php');
        } else {
            echo alert("Username / Password tidak sesuai!", "login.php");
        }
    } else {
        echo "Query error!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitrah Rental Car | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        html,
        body {
            background-color: #fff;
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
        }

        .panel-heading {
            background-color: #fff !important;
            color: #000 !important;
        }

        label {
            color: #000 !important;
        }

        .panel-footer {
            color: #000 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="text-center"><b>FITRAH </b></small> RENTAL CAR</small></h3>
                    </div>
                    <div class="panel-body">
                        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="username" autofocus="on">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                        </form>
                    </div>
                    <div class="panel-footer">
                        Belum punya akun? <a href="index.php?page=daftar">daftar sekarang.</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  </script>
</body>

</html>