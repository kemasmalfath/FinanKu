<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Personal Finance Tracker</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
  <div class="container mx-auto px-4 py-6">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-blue-700">Pencatatan Keuangan Personal</h1>
      <p class="text-gray-600">Kelola uangmu dengan bijak!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- FORM INPUT -->
      <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Tambah Transaksi</h2>
        <form action="add_transaction.php" method="POST" class="space-y-3">
          <input type="text" name="description" placeholder="Deskripsi" class="w-full p-2 border rounded" required>
          <input type="number" step="0.01" name="amount" placeholder="Jumlah" class="w-full p-2 border rounded" required>
          <select name="type" class="w-full p-2 border rounded" required>
            <option value="income">Pemasukan</option>
            <option value="expense">Pengeluaran</option>
          </select>
          <select name="category_id" class="w-full p-2 border rounded" required>
            <?php include 'options_category.php'; ?>
          </select>
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
        </form>
      </div>

      <!-- FORM KATEGORI -->
      <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Tambah Kategori</h2>
        <form action="add_category.php" method="POST" class="space-y-3">
          <input type="text" name="category_name" placeholder="Nama Kategori" class="w-full p-2 border rounded" required>
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Tambah</button>
        </form>
      </div>

      <!-- SALDO DAN NOTIFIKASI -->
      <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Saldo</h2>
        <?php include 'balance_notfication.php'; ?>
      </div>
    </div>

    <!-- LIST TRANSAKSI -->
    <div class="mt-8 bg-white rounded-2xl shadow p-6">
      <h2 class="text-xl font-semibold mb-4">Riwayat Transaksi</h2>
      <?php include 'transaction_list.php'; ?>
    </div>
  </div>
</body>
</html>
