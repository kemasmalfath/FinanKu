<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config/db.php';

$user_id = $_SESSION['user']['id'] ?? null;
if (!$user_id) {
  echo "Tidak bisa menampilkan saldo. Silakan login.";
  exit;
}

$income = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(amount) AS total FROM transactions WHERE type = 'income' AND user_id = $user_id"))['total'] ?? 0;
$expense = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(amount) AS total FROM transactions WHERE type = 'expense' AND user_id = $user_id"))['total'] ?? 0;
$balance = $income - $expense;

echo "<p class='text-2xl font-bold'>Rp " . number_format($balance, 2, ',', '.') . "</p>";

if ($balance < 50000) {
  echo "<p class='mt-2 text-red-600 font-semibold'>⚠️ Saldo hampir habis!</p>";
}
?>
