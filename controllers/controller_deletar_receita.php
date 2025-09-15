<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db.php';

// Protege: só usuários logados podem deletar
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php?bbb=cadastrar");
    exit();
}

// Pega o ID da receita via GET
$id_receita = $_GET['id'] ?? null;

if (!$id_receita) {
    echo "Receita não encontrada!";
    exit();
}

// Só permite deletar se for do usuário logado
$id_usuario = $_SESSION['usuario']['id'];

$sql = "DELETE FROM receitas WHERE id_receita = ? AND usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_receita, $id_usuario);

if ($stmt->execute()) {
    header("Location: /Projeto-1---PW/index.php?bbb=suasreceitas");
    exit();
}
else {
    echo "Erro ao deletar receita: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>