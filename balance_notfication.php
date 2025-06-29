<?php
require 'config/db.php';

$income = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(amount) AS total FROM transactions WHERE type = 'income'"))['total'] ?? 0;
$expense = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(amount) AS total FROM transactions WHERE type = 'expense'"))['total'] ?? 0;
$balance = $income - $expense;

echo "<p class='text-2xl font-bold'>Rp " . number_format($balance, 2, ',', '.') . "</p>";

if ($balance < 50000) {
  echo "<p class='mt-2 text-red-600 font-semibold'>⚠️ Saldo hampir habis!</p>";
}
?>
