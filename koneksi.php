<?php
$host = "database-arella.csgirdm2h4lv.us-east-1.rds.amazonaws.com";
$user = "admin";
$pass = "admin123";
$db   = "arellaDB";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
