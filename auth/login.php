<?php
session_start();
require '../config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek user
    $query = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($query, "s", $username);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username']
        ];
        header('Location: ../index.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - FinanKu</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-6 rounded shadow w-96">
    <h2 class="text-2xl font-bold mb-4 text-center text-blue-700">Login ke FinanKu</h2>
    
    <?php if ($error): ?>
      <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
      <input type="text" name="username" placeholder="Username" class="w-full p-2 border rounded" required>
      <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded" required>
      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white p-2 rounded">Login</button>
      <p class="text-center text-sm mt-2">Belum punya akun? <a href="register.php" class="text-blue-600 underline">Daftar di sini</a></p>
    </form>
  </div>
</body>
</html>
