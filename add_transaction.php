<?php
require 'config/db.php';

date_default_timezone_set('Asia/Jakarta');

$desc = $_POST['description'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$cat = $_POST['category_id'];

// Validate amount
if (!is_numeric($amount)) {
    die('Invalid amount value.');
}

$amount = floatval($amount);

// Optional: limit amount to a maximum value (e.g., 1 billion)
$max_amount = 1000000000;
if ($amount > $max_amount) {
    die('Amount exceeds the maximum allowed value.');
}

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO transactions (description, amount, type, category_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sdsi", $desc, $amount, $type, $cat);
$stmt->execute();
$stmt->close();

header('Location: index.php');
?>
