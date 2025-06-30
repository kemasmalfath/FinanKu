<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: ../auth/login.php");
  exit;
}
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="flex-1 p-6">
  <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white shadow rounded-xl p-6 text-center">
      <h2 class="text-xl font-semibold text-gray-700 mb-2">Total Saldo</h2>
      <?php include '../balance_notfication.php'; ?>
    </div>

    <div class="bg-white shadow rounded-xl p-6 text-center">
      <h2 class="text-xl font-semibold text-gray-700 mb-2">Transaksi Terakhir</h2>
      <?php
      require '../config/db.php';
      $user_id = $_SESSION['user']['id'];
      $sql = "SELECT * FROM transactions WHERE user_id = $user_id ORDER BY created_at DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      if ($row = mysqli_fetch_assoc($result)) {
        echo "<p class='text-gray-600'>" . htmlspecialchars($row['description']) . " - Rp " . number_format($row['amount'], 2, ',', '.') . "</p>";
      } else {
        echo "<p class='text-gray-500'>Belum ada transaksi.</p>";
      }
      ?>
    </div>

    <div class="bg-white shadow rounded-xl p-6 text-center">
      <h2 class="text-xl font-semibold text-gray-700 mb-2">Kategori</h2>
      <?php
      $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM categories WHERE user_id = $user_id");
      $data = mysqli_fetch_assoc($result);
      echo "<p class='text-gray-600'>" . $data['total'] . " kategori</p>";
      ?>
    </div>

  </div>
</div>

<?php include '../includes/footer.php'; ?>
