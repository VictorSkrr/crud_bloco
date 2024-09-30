<?php
session_start();
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conn->prepare("DELETE FROM notas WHERE id = ?");
    $query->execute([$id]);

    header('Location: read.php');
}
?>
