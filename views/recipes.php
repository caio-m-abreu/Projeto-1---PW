<section class="receitas-cadastro">
    <form action="#" method="POST" class="form-receita">
        <h2>Cadastrar Receita</h2>
        <img src="src\img\Linha-menu.svg" alt="linha" class="linha-receita">
        <label for="nome_receita" class="label-receita">Nome da Receita:</label>
        <input type="text" id="nome_receita" name="nome_receita" required>

        <label for="descricao" class="label-receita">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>

        <div class="input-duplo">
            <div>
                <label for="ingredientes" class="label-receita">Ingredientes:</label>
                <textarea id="ingredientes" name="ingredientes" required></textarea>
            </div>
            <div>
                <label for="utensilios" class="label-receita">Utensílios:</label>
                <textarea id="utensilios" name="utensilios" required></textarea>
            </div>
        </div>

        <h2>Etapas da Receita:</h2>
        <img src="src\img\Linha-menu.svg" alt="linha" class="linha-receita">

        <div class="etapas-receita">
            <div>
                <label for="etapa1" class="label-receita">Etapa 1:</label>
                <textarea id="utensilios" name="utensilios" required></textarea>
            </div>
            <div>
                <label for="etapa2" class="label-receita">Etapa 2:</label>
                <textarea id="utensilios" name="utensilios" required></textarea>
            </div>
            <div>
                <label for="etapa3" class="label-receita">Etapa 3:</label>
                <textarea id="utensilios" name="utensilios" required></textarea>
            </div>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</section>