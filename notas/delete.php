<?php
include '../includes/db.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM notas WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: read.php');
}
?>
