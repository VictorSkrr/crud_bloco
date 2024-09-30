<?php
include '../includes/db.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM notas WHERE id = ?");
    $stmt->execute([$id]);
    $nota = $stmt->fetch();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];

        $stmt = $conn->prepare("UPDATE notas SET titulo = ?, conteudo = ? WHERE id = ?");
        $stmt->execute([$titulo, $conteudo, $id]);

        header('Location: read.php');
    }
}
?>

<form method="POST" action="update.php?id=<?php echo $id; ?>">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo $nota['titulo']; ?>" required><br>

    <label for="conteudo">Conteúdo:</label>
    <textarea name="conteudo" required><?php echo $nota['conteudo']; ?></textarea><br>

    <button type="submit">Salvar Alterações</button>
</form>
<a href="read.php">Ver Notas</a>
