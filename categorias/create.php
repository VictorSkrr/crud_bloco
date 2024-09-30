<?php
include '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['name'];
    $usuario_id = $_SESSION['usuario_id']; // Sistema de login necessário

    $stmt = $conn->prepare("INSERT INTO categorias (name, usuario_id) VALUES (?, ?)");
    $stmt->execute([$name, $usuario_id]);

    header('Location: read.php');
}
?>

<form method="POST" action="create.php">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome" required><br>

    <button type="submit">Criar Categoria</button>
</form>
<a href="read.php">Ver Categorias</a>
