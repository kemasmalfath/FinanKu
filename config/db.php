<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // sesuaikan password MySQL kamu
$db   = 'FinanKu';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
  die('Koneksi gagal: ' . mysqli_connect_error());
}
?>
