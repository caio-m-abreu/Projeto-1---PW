<section class="cadastro">
    <div class="cadastro__container">
        <h2 class="cadastro__titulo">Entrar</h2>
        <form action="controllers/controller_login.php" method="POST" class="cadastro__form">
            <label for="email" class="cadastro__label">E-mail</label>
            <input type="email" class="cadastro__input" id="email" name="email" placeholder="E-mail" required>
            
            <label for="senha" class="cadastro__label">Senha</label>
            <input type="password" class="cadastro__input" id="senha" name="senha" placeholder="Senha" required>
            
            <button type="submit" class="cadastro__button">Entrar</button>
            <p class="cadastro__descricao">Ainda não tem conta?? Clique <a href="?bbb=cadastrar"><b>aqui</b></a> para cadastrar-se</p>
        </form>
    </div>
</section>