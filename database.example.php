<?php
// Salin file ini menjadi database.php dan sesuaikan isinya
$hostName = "localhost";
$dbUser   = "USERNAME_DATABASE_KAMU";
$dbPassword = "PASSWORD_DATABASE_KAMU";
$dbName   = "NAMA_DATABASE_KAMU";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Sesuatu ada yang salah dengan koneksi database");
}
?>
