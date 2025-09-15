<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db.php';

// Protege a listagem: apenas usuários logados
if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php?bbb=cadastrar"); // redireciona para cadastro
    exit();
}

// Pega o ID do usuário logado
$id_usuario = $_SESSION['usuario']['id'];

// Busca apenas as receitas do usuário logado
$sql = "SELECT r.id_receita, r.nome_receita, r.descricao, u.nome AS autor, u.foto
        FROM receitas r
        JOIN usuarios u ON r.usuario_id = u.id
        WHERE r.usuario_id = ?
        ORDER BY r.id_receita DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

$receitas = [];
if ($result && $result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
        $receitas[] = $linha;
    }
}

$stmt->close();
$conn->close();
?>