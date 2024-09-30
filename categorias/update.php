<?php
include '../includes/db.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM categorias WHERE id = ?");
    $stmt->execute([$id]);
    $categoria = $stmt->fetch();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['name'];

        $stmt = $conn->prepare("UPDATE categorias SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);

        header('Location: read.php');
    }
}
?>

<form method="POST" action="update.php?id=<?php echo $id; ?>">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" name="nome" value="<?php echo $categoria['name']; ?>" required><br>

    <button type="submit">Salvar Alterações</button>
</form>
<a href="read.php">Ver Categorias</a>

