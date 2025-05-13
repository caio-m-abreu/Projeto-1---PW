<?php
$servidor = "localhost";
$usuario = "root";
$senha = ""; // senha padrão do XAMPP é vazia
$banco = "usuarios_db";//bancos de dados

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>