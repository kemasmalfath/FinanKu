<?php
require 'config/db.php';
$result = mysqli_query($conn, "SELECT * FROM categories");
while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
?>
