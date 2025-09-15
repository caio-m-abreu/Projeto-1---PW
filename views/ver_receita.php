<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?bbb=cadastrar");
    exit();
}

include __DIR__ . '/../controllers/controller_ver_receita.php';

// Verifica se o usuário logado é o dono da receita
$usuario_logado = $_SESSION['usuario']['id'];
$dono_receita = ($receita['usuario_id'] ?? null) === $usuario_logado;
?>

<style>
body {
    font-family: Arial, sans-serif;
    background: #fdf9e7;
    padding: 20px;
}
.card {
    background: #fff5e6;
    border-radius: 12px;
    padding: 20px;
    max-width: 700px;
    margin: 0 auto;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.15);
}
.card h2 {
    font-size: 26px;
    margin-bottom: 10px;
}
.card p {
    font-size: 16px;
    margin-bottom: 8px;
}
.autor {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 15px;
}
.autor img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}
.section-title {
    font-weight: bold;
    margin-top: 15px;
}
.botao {
    display: inline-block;
    margin-top: 15px;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    color: #fff;
    background-color: #f57c00;
    margin-right: 10px;
}
.botao.delete {
    background-color: #d32f2f;
}
</style>

<div class="card">
    <h2><?= htmlspecialchars($receita['nome_receita']); ?></h2>
    <p><strong>Descrição:</strong> <?= htmlspecialchars($receita['descricao']); ?></p>

    <p class="section-title">Ingredientes:</p>
    <p><?= nl2br(htmlspecialchars($receita['ingredientes'])); ?></p>

    <p class="section-title">Utensílios:</p>
    <p><?= nl2br(htmlspecialchars($receita['utensilios'])); ?></p>

    <p class="section-title">Etapas:</p>
    <p>1️⃣ <?= htmlspecialchars($receita['etapa1']); ?></p>
    <p>2️⃣ <?= htmlspecialchars($receita['etapa2']); ?></p>
    <p>3️⃣ <?= htmlspecialchars($receita['etapa3']); ?></p>

    <div class="autor">
        <img src="<?= htmlspecialchars($receita['foto'] ?? './src/img/tung.jpg'); ?>" alt="Foto do autor">
        <span><?= htmlspecialchars($receita['autor'] ?? 'Autor desconhecido'); ?></span>
    </div>

    <?php if ($dono_receita): ?>
        <!-- Botões de Editar e Deletar apenas para o dono da receita -->
        <div>
            <a href="index.php?bbb=editar_receita&id=<?= $receita['id_receita']; ?>" class="botao">✏️ Editar</a>
            <a href="index.php?bbb=deletar_receita&id=<?= $receita['id_receita']; ?>"
               onclick="return confirm('Tem certeza que deseja deletar esta receita?');" 
               class="botao delete">🗑️ Deletar</a>
        </div>
    <?php endif; ?>
</div>