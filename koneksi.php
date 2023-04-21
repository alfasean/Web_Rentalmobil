<?php
date_default_timezone_set('Asia/Jakarta');
$now = date("Y-m-d H:i:s");

 if (!$connection = new Mysqli("localhost", "root", "", "rental_mobil")) {
  echo "<h3>ERROR: Koneksi database gagal!</h3>";
}

if (isset($_GET["page"])) {
  $_PAGE = $_GET["page"];
  $_ADMINPAGE = $_GET["page"];
} else {
  $_PAGE = "home";
  $_ADMINPAGE = "home";
}
/**
 * Page setup
 * @param page
 * @return page filename
 */
function page($page) {
  return "pelanggan/" . $page . ".php";
}
/**
 * Page setup
 * @param page
 * @return page filename
 */
function adminPage($page) {
  return "page/" . $page . ".php";
}

/**
 * Alert notification
 * @param message, redirection
 * @return alert notify
 */

function alert($msg, $to = null) {
  $to = ($to) ? $to : $_SERVER["PHP_SELF"];
  return "<script>alert('{$msg}');window.location='{$to}';</script>";
}

// Update otomatis
$query = $connection->query("SELECT a.id_mobil, a.id_transaksi, (DATEDIFF(NOW(), a.tgl_ambil)) AS tgl FROM transaksi a WHERE a.status='0'");
if ($query === false) {
  die("Query gagal dijalankan: " . $connection->error);
}
while ($data = $query->fetch_assoc()) {
  if ($data["tgl"] >= 0) {
    $connection->query("UPDATE mobil SET status='0' WHERE id_mobil=$data[id_mobil]");
  }
}

// Pembatalan otomatis
$query = $connection->query("SELECT a.jatuh_tempo, a.id_transaksi, a.id_mobil, (TIMESTAMPDIFF(HOUR, a.tgl_sewa, NOW())) AS tempo FROM transaksi a WHERE a.konfirmasi='0'");
while ($data = $query->fetch_assoc()) {
  if ($data["tempo"] > 3) {
    $connection->query("UPDATE transaksi SET pembatalan='1' WHERE id_transaksi=$data[id_transaksi]");
    $connection->query("UPDATE mobil SET status='1' WHERE id_mobil=$data[id_mobil]");
    $q = $connection->query("SELECT id_supir FROM detail_transaksi WHERE id_transaksi=$data[id_transaksi]");
    
  }
}

