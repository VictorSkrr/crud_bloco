<?php
include '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $usuario_id = $_SESSION['usuario_id']; // Sistema de login necessário

    $stmt = $conn->prepare("INSERT INTO categorias (nome, usuario_id) VALUES (?, ?)");
    $stmt->execute([$nome, $usuario_id]);

    header('Location: read.php');
}
?>

<form method="POST" action="create.php">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome" required><br>

    <button type="submit">Criar Categoria</button>
</form>
<a href="read.php">Ver Categorias</a>
