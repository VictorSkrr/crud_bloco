<?php
include '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $usuario_id = $_SESSION['usuario_id']; // Você precisa implementar o sistema de login para capturar isso

    $stmt = $conn->prepare("INSERT INTO notas (titulo, conteudo, usuario_id) VALUES (?, ?, ?)");
    $stmt->execute([$titulo, $conteudo, $usuario_id]);

    header('Location: read.php');
}
?>

<form method="POST" action="create.php">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required><br>

    <label for="conteudo">Conteúdo:</label>
    <textarea name="conteudo" required></textarea><br>

    <button type="submit">Criar Nota</button>
</form>
<a href="read.php">Ver Notas</a>
