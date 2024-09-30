<?php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM categorias WHERE id = ?");
    $stmt->execute([$id]);
    $categoria = $stmt->fetch();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];

        $stmt = $conn->prepare("UPDATE categorias SET nome = ? WHERE id = ?");
        $stmt->execute([$nome, $id]);

        header('Location: read.php');
        exit();
    }
}
?>

<form method="POST" action="update.php?id=<?php echo $id; ?>">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($categoria['nome']); ?>" required><br>

    <button type="submit">Salvar Alterações</button>
</form>

<a href="read.php">Ver Categorias</a>

