<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?bbb=cadastrar");
    exit();
}

include __DIR__ . '/../db.php';

// Pega o ID da receita via GET
$id_receita = $_GET['id'] ?? null;
$usuario_logado = $_SESSION['usuario']['id'];

if (!$id_receita) {
    echo "Receita não encontrada!";
    exit();
}

// Busca a receita
$sql = "SELECT * FROM receitas WHERE id_receita = ? AND usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_receita, $usuario_logado);
$stmt->execute();
$result = $stmt->get_result();
$receita = $result->fetch_assoc();

$stmt->close();
$conn->close();

if (!$receita) {
    echo "Receita não encontrada ou você não tem permissão para editar.";
    exit();
}
?>

<style>
body {
    font-family: Arial, sans-serif;
    background: #fdf9e7;
    padding: 20px;
}
form {
    max-width: 600px;
    margin: 0 auto;
    background: #fff5e6;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.15);
}
form h2 {
    margin-bottom: 20px;
    text-align: center;
}
form label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}
form input, form textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
}
form button {
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
    background-color: #f57c00;
    color: #fff;
    border-radius: 6px;
    cursor: pointer;
}
form button:hover {
    background-color: #e65100;
}
</style>

<form action="controllers/controller_alterar_receita.php" method="POST">
    <h2>Editar Receita</h2>

    <input type="hidden" name="id_receita" value="<?= $receita['id_receita']; ?>">

    <label>Nome da Receita</label>
    <input type="text" name="nome_receita" value="<?= htmlspecialchars($receita['nome_receita']); ?>" required>

    <label>Descrição</label>
    <textarea name="descricao" rows="3" required><?= htmlspecialchars($receita['descricao']); ?></textarea>

    <label>Ingredientes</label>
    <textarea name="ingredientes" rows="3" required><?= htmlspecialchars($receita['ingredientes']); ?></textarea>

    <label>Utensílios</label>
    <textarea name="utensilios" rows="3" required><?= htmlspecialchars($receita['utensilios']); ?></textarea>

    <label>Etapa 1</label>
    <textarea name="etapa1" rows="2"><?= htmlspecialchars($receita['etapa1']); ?></textarea>

    <label>Etapa 2</label>
    <textarea name="etapa2" rows="2"><?= htmlspecialchars($receita['etapa2']); ?></textarea>

    <label>Etapa 3</label>
    <textarea name="etapa3" rows="2"><?= htmlspecialchars($receita['etapa3']); ?></textarea>

    <button type="submit">Salvar Alterações</button>
</form>