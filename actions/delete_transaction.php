<?php
require '../config/db.php';
session_start();

$id = $_GET['id'];
$user_id = $_SESSION['user']['id'];

$stmt = $conn->prepare("DELETE FROM transactions WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();
$stmt->close();

header('Location: ../pages/transactions.php');
exit;
?>
