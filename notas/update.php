<?php
session_start();
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $conteudo = $_POST['conteudo'];

        $query = $conn->prepare("UPDATE notas SET titulo = ?, conteudo = ? WHERE id = ?");
        $query->execute([$titulo, $conteudo, $id]);

        header('Location: read.php');
    } else {
        $query = $conn->prepare("SELECT * FROM notas WHERE id = ?");
        $query->execute([$id]);
        $nota = $query->fetch();
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
