<?php
session_start();
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $usuario_id = $_SESSION['usuario_id'];

    $query = $conn->prepare("INSERT INTO notas (titulo, conteudo, usuario_id) VALUES (?, ?, ?)");
    $query->execute([$titulo, $conteudo, $usuario_id]);

    header('Location: read.php');
}
?>

<form method="POST" action="create.php">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required><br>
    <label for="conteudo">Conteúdo:</label>
    <textarea name="conteudo" required></textarea><br>
    <button type="submit">Salvar Nota</button>
</form>
