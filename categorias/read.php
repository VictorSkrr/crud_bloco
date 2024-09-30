<?php
include '../includes/db.php';

$stmt = $conn->prepare("SELECT * FROM categorias");
$stmt->execute();
$categorias = $stmt->fetchAll();
?>

<h1>Categorias</h1>
<a href="create.php">Criar Nova Categoria</a>
<ul>
    <?php foreach ($categorias as $categoria): ?>
        <li>
            <strong><?php echo htmlspecialchars($categoria['nome']); ?></strong>
            <a href="update.php?id=<?php echo $categoria['id']; ?>">Editar</a>
            <a href="delete.php?id=<?php echo $categoria['id']; ?>">Excluir</a>
        </li>
    <?php endforeach; ?>
</ul>

