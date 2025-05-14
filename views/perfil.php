<?php
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?bbb=login");
    exit();
}
$usuario = $_SESSION['usuario'];
?>
<section class="perfil">
    <div class="perfil__container">
        <h2>Meu Perfil</h2>

        <form action="controllers/controller_perfil.php" method="POST" enctype="multipart/form-data">
            <div class="perfil__foto">
                <img src="<?= $usuario['foto'] ?>" alt="Foto de perfil" width="120" height="120">
                <input type="file" name="foto">
            </div>

            <label>Nome</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>

            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

            <label>Nova Senha</label>
            <input type="password" name="senha">

            <button type="submit">Salvar alterações</button>
        </form>
    </div>
</section>