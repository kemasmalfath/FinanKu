<?php
session_start();
require '../config/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Validasi
    if ($password !== $confirm) {
        $error = "Password dan konfirmasi tidak cocok.";
    } else {
        // Cek apakah username sudah digunakan
        $check = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ?");
        mysqli_stmt_bind_param($check, "s", $username);
        mysqli_stmt_execute($check);
        mysqli_stmt_store_result($check);

        if (mysqli_stmt_num_rows($check) > 0) {
            $error = "Username sudah terdaftar.";
        } else {
            // Enkripsi password
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $insert = mysqli_prepare($conn, "INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($insert, "sss", $name, $username, $hashed);
            mysqli_stmt_execute($insert);

            $success = "Pendaftaran berhasil. Silakan login.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - FinanKu</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-6 rounded shadow w-96">
    <h2 class="text-2xl font-bold mb-4 text-center text-green-700">Daftar Akun</h2>

    <?php if ($error): ?>
      <div class="bg-red-100 text-red-600 p-2 rounded mb-3">
        <?= $error ?>
      </div>
    <?php elseif ($success): ?>
      <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
        <?= $success ?> <a href="login.php" class="text-blue-600 underline">Login sekarang</a>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-3">
      <input type="text" name="name" placeholder="Nama Lengkap" class="w-full p-2 border rounded" required>
      <input type="text" name="username" placeholder="Username" class="w-full p-2 border rounded" required>
      <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded" required>
      <input type="password" name="confirm_password" placeholder="Konfirmasi Password" class="w-full p-2 border rounded" required>
      <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white p-2 rounded">Daftar</button>
      <p class="text-center text-sm mt-2">Sudah punya akun? <a href="login.php" class="text-blue-600 underline">Login di sini</a></p>
    </form>
  </div>
</body>
</html>
