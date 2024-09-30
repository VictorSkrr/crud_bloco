<?php
include '../includes/db.php';

$stmt = $conn->prepare("SELECT * FROM notas");
$stmt->execute();
$notas = $stmt->fetchAll();
?>

<h1>Notas</h1>
<a href="create.php">Criar Nova Nota</a>
<ul>
    <?php foreach ($notas as $nota): ?>
        <li>
            <strong><?php echo htmlspecialchars($nota['titulo']); ?></strong> - 
            <?php echo htmlspecialchars($nota['conteudo']); ?> 
            (<?php echo $nota['data_criacao']; ?>)
            <a href="update.php?id=<?php echo $nota['id']; ?>">Editar</a>
            <a href="delete.php?id=<?php echo $nota['id']; ?>">Excluir</a>
        </li>
    <?php endforeach; ?>
</ul>
