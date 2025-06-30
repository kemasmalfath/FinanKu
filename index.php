<?php
session_start();

// Jika belum login, arahkan ke halaman login
if (!isset($_SESSION['user'])) {
  header("Location: auth/login.php");
  exit;
}

// Jika sudah login, arahkan ke dashboard
header("Location: pages/dashboard.php");
exit;

?>
