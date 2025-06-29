<?php
require 'config/db.php';
$cat_name = $_POST['category_name'];
mysqli_query($conn, "INSERT INTO categories (name) VALUES ('$cat_name')");
header('Location: index.php');
?>
