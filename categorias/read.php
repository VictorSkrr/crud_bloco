<?php
include '../includes/db.php';
session_start();

$usuario_id = $_SESSION['usuario_id']; // Sistema de login necessário

$stmt = $conn->prepare("SELECT * FROM categorias WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$categorias = $stmt->fetchAll();
?>

<h1>Categorias</h1>
<a href="create.php">Criar Nova Categoria</a>
<ul>
    <?php foreach ($categorias as $categoria): ?>
        <li>
            <strong><?php echo $categoria['nome']; ?></strong>
            <a href="update.php?id=<?php echo $categoria['id']; ?>">Editar</a>
            <a href="delete.php?id=<?php echo $categoria['id']; ?>">Excluir</a>
        </li>
    <?php endforeach; ?>
</ul>
