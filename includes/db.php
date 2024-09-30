<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=sistema_bloco_de_notas', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
