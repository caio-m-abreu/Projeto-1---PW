<?php include __DIR__ . '/../controllers/controller_listar_recipes.php'; ?>

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
        gap: 5px;
    }
    .autor i {
        font-size: 18px;
    }
    .card-img {
        width: 150px;
        object-fit: cover;
    }
</style>

<div class="container">
    <?php if (!empty($receitas)): ?>
        <?php foreach ($receitas as $linha): ?>
            <div class="card">
                <div class="card-info">
                    <h2><?= htmlspecialchars($linha['nome_receita']); ?></h2>
                    <p><?= htmlspecialchars($linha['descricao']); ?></p>
                    <div class="autor">
                        <i>👤</i> Autor desconhecido
                    </div>
                </div>
                <img src="./src/img/tung.jpg" alt="Receita" class="card-img">
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="padding:20px;">Nenhuma receita cadastrada ainda.</p>
    <?php endif; ?>
</div>