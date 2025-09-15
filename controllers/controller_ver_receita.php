<?php
// Inicia sessão se não estiver ativa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db.php';

// Protege a página: apenas usuários logados
if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php?bbb=cadastrar");
    exit();
}

// Recebe o ID da receita via GET
$id_receita = $_GET['id'] ?? null;

if (!$id_receita) {
    echo "Receita não encontrada!";
    exit();
}

// Busca a receita com LEFT JOIN para não quebrar com receitas antigas
$sql = "SELECT r.*, u.nome AS autor, u.foto 
        FROM receitas r
        LEFT JOIN usuarios u ON r.usuario_id = u.id
        WHERE r.id_receita = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_receita);
$stmt->execute();
$result = $stmt->get_result();
$receita = $result->fetch_assoc();

if (!$receita) {
    echo "Receita não encontrada!";
    exit();
}

$stmt->close();
$conn->close();
?>