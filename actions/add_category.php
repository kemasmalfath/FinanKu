<?php
require '../config/db.php';
session_start();

$user_id = $_SESSION['user']['id'];
$name = $_POST['category_name'];

$stmt = $conn->prepare("INSERT INTO categories (name, user_id) VALUES (?, ?)");
$stmt->bind_param("si", $name, $user_id);
$stmt->execute();
$stmt->close();

header('Location: ../pages/categories.php');
exit;
?>
