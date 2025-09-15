<?php
session_start();
include __DIR__ . '/../db.php';

$usuario_id = $_SESSION['usuario']['id'];
$id_receita = $_POST['id_receita'] ?? null;

if (!$id_receita) {
    die("ID da receita não informado!");
}

// Campos enviados
$nome = $_POST['nome_receita'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$ingredientes = $_POST['ingredientes'] ?? '';
$utensilios = $_POST['utensilios'] ?? '';
$etapa1 = $_POST['etapa1'] ?? '';
$etapa2 = $_POST['etapa2'] ?? '';
$etapa3 = $_POST['etapa3'] ?? '';

// UPDATE apenas se o usuário for o dono
$stmt = $conn->prepare("UPDATE receitas 
    SET nome_receita=?, descricao=?, ingredientes=?, utensilios=?, etapa1=?, etapa2=?, etapa3=? 
    WHERE id_receita=? AND usuario_id=?");
$stmt->bind_param("ssssssiii", $nome, $descricao, $ingredientes, $utensilios, $etapa1, $etapa2, $etapa3, $id_receita, $usuario_id);

if (!$stmt->execute()) {
    die("Erro ao atualizar: " . $stmt->error);
}

$stmt->close();
$conn->close();

// Redireciona para listar apenas as receitas do usuário
header("Location: ../index.php?bbb=suasreceitas");
exit();