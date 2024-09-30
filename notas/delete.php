<?php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluindo a nota
    $stmt = $conn->prepare("DELETE FROM notas WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: read.php');
    exit();
}
?>
