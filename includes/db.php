<?php
// Arquivo: includes/db.php
$host = 'localhost';
$dbname = 'sistema_bloco_de_notas';
$username = 'root'; // Altere conforme necessário
$password = 'root'; // Altere conforme necessário

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
