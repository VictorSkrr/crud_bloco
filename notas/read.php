<?php
session_start();
include '../includes/db.php';

$query = $conn->prepare("SELECT * FROM notas WHERE usuario_id = ?");
$query->execute([$_SESSION['usuario_id']]);
$notas = $query->fetchAll();
?>

<h1>Minhas Notas</h1>
<ul>
    <?php foreach ($notas as $nota): ?>
        <li>
            <strong><?php echo $nota['titulo']; ?></strong> - <?php echo $nota['conteudo']; ?>
            <a href="update.php?id=<?php echo $nota['id']; ?>">Editar</a> |
            <a href="delete.php?id=<?php echo $nota['id']; ?>">Excluir</a>
        </li>
    <?php endforeach; ?>
</ul>

<a href="create.php">Adicionar nova nota</a>
