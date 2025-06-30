<?php
require '../config/db.php';
session_start();

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_keuangan.xls");

$user_id = $_SESSION['user']['id'];
$where = "WHERE t.user_id = $user_id";

if (isset($_GET['bulan']) && $_GET['bulan'] != '') {
    $bulan = $_GET['bulan'];
    $where .= " AND DATE_FORMAT(t.created_at, '%Y-%m') = '$bulan'";
}

$sql = "
  SELECT t.*, c.name AS category
  FROM transactions t
  JOIN categories c ON t.category_id = c.id
  $where
  ORDER BY t.created_at DESC
";

$result = mysqli_query($conn, $sql);

echo "<table border='1'>
<tr><th>Tanggal</th><th>Deskripsi</th><th>Kategori</th><th>Tipe</th><th>Jumlah</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
    <td>" . date('d-m-Y', strtotime($row['created_at'])) . "</td>
    <td>" . $row['description'] . "</td>
    <td>" . $row['category'] . "</td>
    <td>" . ucfirst($row['type']) . "</td>
    <td>Rp " . number_format($row['amount'], 2, ',', '.') . "</td>
  </tr>";
}

echo "</table>";
?>
