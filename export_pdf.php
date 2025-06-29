<?php
require 'config/db.php';
require 'vendor/autoload.php'; // jika pakai Composer

use Dompdf\Dompdf;

$where = '';
if (isset($_GET['bulan']) && $_GET['bulan'] != '') {
  $bulan = $_GET['bulan'];
  $where = "WHERE DATE_FORMAT(t.created_at, '%Y-%m') = '$bulan'";
}

$sql = "
  SELECT t.*, c.name AS category
  FROM transactions t
  JOIN categories c ON t.category_id = c.id
  $where
  ORDER BY t.created_at DESC
";

$result = mysqli_query($conn, $sql);

$html = "<h2>Daftar Transaksi</h2><table border='1' width='100%' cellspacing='0' cellpadding='5'>
<tr><th>Tanggal</th><th>Deskripsi</th><th>Kategori</th><th>Tipe</th><th>Jumlah</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
  $html .= "<tr>
    <td>" . date('d M Y', strtotime($row['created_at'])) . "</td>
    <td>" . $row['description'] . "</td>
    <td>" . $row['category'] . "</td>
    <td>" . ucfirst($row['type']) . "</td>
    <td>Rp " . number_format($row['amount'], 2, ',', '.') . "</td>
  </tr>";
}

$html .= "</table>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("laporan_keuangan.pdf");
?>
