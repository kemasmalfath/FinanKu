<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config/db.php';

$user_id = $_SESSION['user']['id'] ?? null;
if (!$user_id) {
  echo "Silakan login untuk melihat transaksi.";
  exit;
}

// Filter berdasarkan bulan
$where = "WHERE t.user_id = $user_id";
if (isset($_GET['bulan']) && $_GET['bulan'] != '') {
  $bulan = $_GET['bulan'];
  $where .= " AND DATE_FORMAT(t.created_at, '%Y-%m') = '$bulan'";
}

// Ambil data transaksi
$sql = "
  SELECT t.*, c.name AS category
  FROM transactions t
  JOIN categories c ON t.category_id = c.id
  $where
  ORDER BY t.created_at DESC
";
$result = mysqli_query($conn, $sql);
?>

<table class="w-full text-left border">
  <thead>
    <tr class="bg-gray-100">
      <th class="p-2">Tanggal</th>
      <th class="p-2">Deskripsi</th>
      <th class="p-2">Kategori</th>
      <th class="p-2">Tipe</th>
      <th class="p-2">Jumlah</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr class="border-t">
        <td class="p-2 text-sm text-gray-500"><?= date('d M Y, H:i', strtotime($row['created_at'])) ?></td>
        <td class="p-2"><?= htmlspecialchars($row['description']) ?></td>
        <td class="p-2"><?= htmlspecialchars($row['category']) ?></td>
        <td class="p-2"><?= $row['type'] === 'income' ? 'Pemasukan' : 'Pengeluaran' ?></td>
        <td class="p-2">Rp <?= number_format($row['amount'], 2, ',', '.') ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
