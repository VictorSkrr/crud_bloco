<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];

    $stmt = $conn->prepare("INSERT INTO notas (titulo, conteudo) VALUES (?, ?)");
    $stmt->execute([$titulo, $conteudo]);

    header('Location: read.php');
    exit();
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
