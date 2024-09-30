<?php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluindo a categoria
    $stmt = $conn->prepare("DELETE FROM categorias WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: read.php');
    exit();
}
?>
