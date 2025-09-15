<?php
// Inicia sessão e protege a página
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?bbb=cadastrar"); // redireciona para cadastro se não estiver logado
    exit();
}

// Inclui o controller atualizado
include __DIR__ . '/../controllers/controller_listar_recipes.php';
?>

<style>
body {
    font-family: Arial, sans-serif;
    background: #fdf9e7;
}
.container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 20px;
    padding: 20px;
}
.card {
    background: #fff5e6;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.15);
    display: flex;
    flex-direction: row;
    cursor: pointer;
    transition: transform 0.2s;
}
.card:hover {
    transform: scale(1.02);
}
.card-info {
    padding: 20px;
    flex: 1;
}
.card-info h2 {
    font-size: 20px;
    margin-bottom: 10px;
}
.card-info p {
    font-size: 14px;
    color: #444;
}
.autor {
    font-size: 13px;
    color: #555;
    margin-top: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.autor img {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    object-fit: cover;
}
.card-img {
    width: 150px;
    object-fit: cover;
}
</style>

<div class="container">
<?php if (!empty($receitas)): ?>
    <?php foreach ($receitas as $linha): ?>
        <!-- Link para ver receita individual -->
        <a href="index.php?bbb=ver_receita&id=<?= $linha['id_receita']; ?>" style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-info">
                    <h2><?= htmlspecialchars($linha['nome_receita']); ?></h2>
                    <p><?= htmlspecialchars($linha['descricao']); ?></p>
                    <div class="autor">
                        <img src="<?= htmlspecialchars($linha['foto'] ?? './src/img/tung.jpg'); ?>" alt="Foto do autor">
                        <?= htmlspecialchars($linha['autor'] ?? 'Autor desconhecido'); ?>
                    </div>
                </div>
                <img src="./src/img/tung.jpg" alt="Imagem da receita" class="card-img">
            </div>
        </a>
    <?php endforeach; ?>
<?php else: ?>
    <p style="padding:20px;">Você ainda não cadastrou nenhuma receita.</p>
<?php endif; ?>
</div>