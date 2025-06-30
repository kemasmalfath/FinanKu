<?php
require '../config/db.php';
session_start();

$user_id = $_SESSION['user']['id'];
$desc = $_POST['description'];
$amount = floatval($_POST['amount']);
$type = $_POST['type'];
$category_id = $_POST['category_id'];

if (!is_numeric($amount)) {
    die('Jumlah tidak valid');
}

$stmt = $conn->prepare("INSERT INTO transactions (description, amount, type, category_id, user_id) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sdsii", $desc, $amount, $type, $category_id, $user_id);
$stmt->execute();
$stmt->close();

header('Location: ../pages/transactions.php');
exit;
?>
