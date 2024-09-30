<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $stmt = $conn->prepare("INSERT INTO categorias (nome) VALUES (?)");
    $stmt->execute([$nome]);

    header('Location: read.php');
    exit();
}
?>

<form method="POST" action="create.php">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome" required><br>

    <button type="submit">Criar Categoria</button>
</form>

<a href="read.php">Ver Categorias</a>
