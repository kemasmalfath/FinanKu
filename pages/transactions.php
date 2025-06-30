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
  <h1 class="text-2xl font-bold text-gray-800 mb-6">Transaksi</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    <!-- FORM TRANSAKSI -->
    <div class="bg-white shadow rounded-2xl p-6">
      <h2 class="text-xl font-semibold mb-4">Tambah Transaksi</h2>
      <form action="../actions/add_transaction.php" method="POST" class="space-y-3">
        <input type="text" name="description" placeholder="Deskripsi" class="w-full p-2 border rounded" required>
        <input type="number" step="0.01" name="amount" placeholder="Jumlah" class="w-full p-2 border rounded" required>
        <select name="type" class="w-full p-2 border rounded" required>
          <option value="income">Pemasukan</option>
          <option value="expense">Pengeluaran</option>
        </select>
        <select name="category_id" class="w-full p-2 border rounded" required>
          <?php include '../includes/options_category.php'; ?>
        </select>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">Simpan</button>
      </form>
    </div>

    <!-- FORM KATEGORI -->
    <div class="bg-white shadow rounded-2xl p-6">
      <h2 class="text-xl font-semibold mb-4">Tambah Kategori</h2>
      <form action="../actions/add_category.php" method="POST" class="space-y-3">
        <input type="text" name="category_name" placeholder="Nama Kategori" class="w-full p-2 border rounded" required>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded w-full">Tambah</button>
      </form>
    </div>

    <!-- SALDO -->
    <div class="bg-white shadow rounded-2xl p-6">
      <h2 class="text-xl font-semibold mb-4">Saldo</h2>
      <?php include '../balance_notfication.php'; ?>
    </div>

  </div>

  <!-- FILTER & EXPORT -->
  <div class="mb-4 flex flex-col md:flex-row gap-2">
    <form method="GET" class="flex gap-2">
      <input type="month" name="bulan" class="border p-2 rounded" value="<?= $_GET['bulan'] ?? '' ?>">
      <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">Filter</button>
      <a href="transactions.php" class="text-blue-600 underline px-3 py-2">Reset</a>
    </form>

    <div class="flex gap-2 ml-auto">
      <a href="../export/export_pdf.php<?= isset($_GET['bulan']) ? '?bulan=' . $_GET['bulan'] : '' ?>" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Export PDF</a>
      <a href="../export/export_excel.php<?= isset($_GET['bulan']) ? '?bulan=' . $_GET['bulan'] : '' ?>" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Export Excel</a>
    </div>
  </div>

  <!-- TABEL TRANSAKSI -->
  <div class="bg-white shadow rounded-2xl p-6">
    <h2 class="text-xl font-semibold mb-4">Riwayat Transaksi</h2>
    <?php include '../transaction_list.php'; ?>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
