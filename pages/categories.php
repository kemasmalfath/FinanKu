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
  <h1 class="text-2xl font-bold text-gray-800 mb-6">Manajemen Kategori</h1>

  <!-- FORM TAMBAH KATEGORI -->
  <div class="bg-white shadow rounded-xl p-6 mb-6">
    <h2 class="text-xl font-semibold mb-4">Tambah Kategori Baru</h2>
    <form action="../actions/add_category.php" method="POST" class="flex flex-col md:flex-row gap-4">
      <input type="text" name="category_name" placeholder="Nama Kategori" class="p-2 border rounded w-full md:w-1/2" required>
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Tambah</button>
    </form>
  </div>

  <!-- LIST KATEGORI -->
  <div class="bg-white shadow rounded-xl p-6">
    <h2 class="text-xl font-semibold mb-4">Daftar Kategori</h2>
    <table class="w-full border">
      <thead>
        <tr class="bg-gray-100 text-left">
          <th class="p-2">#</th>
          <th class="p-2">Nama Kategori</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require '../config/db.php';
        $user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM categories WHERE user_id = $user_id ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr class='border-t'>
                  <td class='p-2'>{$no}</td>
                  <td class='p-2'>" . htmlspecialchars($row['name']) . "</td>
                </tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
