<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<!-- DASHBOARD -->
<div class="flex-1 p-6">
  <h1 class="text-2xl font-bold mb-4 text-blue-700">Selamat Datang 👋</h1>
  <p class="text-gray-600 mb-6">Kelola keuanganmu dengan mudah menggunakan aplikasi Finanku.</p>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-white rounded-xl shadow p-4">
      <p class="text-gray-500 text-sm">Saldo Saat Ini</p>
      <?php include 'balance_notfication.php'; ?>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
      <p class="text-gray-500 text-sm">Jumlah Kategori</p>
      <?php
      require 'config/db.php';
      $totalKategori = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM categories"));
      echo "<p class='text-2xl font-bold'>$totalKategori</p>";
      ?>
    </div>
    <div class="bg-white rounded-xl shadow p-4">
      <p class="text-gray-500 text-sm">Total Transaksi</p>
      <?php
      $totalTransaksi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transactions"));
      echo "<p class='text-2xl font-bold'>$totalTransaksi</p>";
      ?>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
