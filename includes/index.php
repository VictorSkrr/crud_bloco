<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
}
?>

<h1>Bem-vindo ao Sistema de Bloco de Notas</h1>
<ul>
    <li><a href="notas/read.php">Gerenciar Notas</a></li>
    <li><a href="categorias/read.php">Gerenciar Categorias</a></li>
</ul>
