<?php
include '../includes/db.php';
session_start();

$usuario_id = $_SESSION['usuario_id']; // Você precisa implementar o sistema de login

$stmt = $conn->prepare("SELECT * FROM notas WHERE usuario_id = ?");
$stmt->execute([$usuario_id]);
$notas = $stmt->fetchAll();
?>

<h1>Notas</h1>
<a href="create.php">Criar Nova Nota</a>
<ul>
    <?php foreach ($notas as $nota): ?>
        <li>
            <strong><?php echo $nota['titulo']; ?></strong> - <?php echo $nota['conteudo']; ?>
            <a href="update.php?id=<?php echo $nota['id']; ?>">Editar</a>
            <a href="delete.php?id=<?php echo $nota['id']; ?>">Excluir</a>
        </li>
    <?php endforeach; ?>
</ul>
