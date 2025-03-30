<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap Demo</title>
        <link rel="stylesheet" href="./src\styles\style.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400..800&family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap');

            :root{
                --cor-de-fundo: #F6F5AE;
                --preto-texto: #000000;
                --vermelho: #92140C;
                --laranja-box: #BE5A38;
                --branco-texto: #FFFFFF;
                --fonte-titulo: "Wix Madefor Display", sans-serif;
                --fonte-texto: "Wix Madefor Text", sans-serif;
            }
            *{
                margin: 0;
                padding: 0;
            }
            .principal{
                display: flex;
            }
            .principal__container{
                padding: 2.5em;
            }
            .principal__caranguejo{
                height: 48em;
                width: 37em;
            }
            .container__titulo{
                color: var(--preto-texto);
                font-size: 4em;
                font-family: var(--fonte-titulo);
            }
            .container__texto{
                color: var(--preto-texto);
                font-size: 1.5em;
                font-family: var(--fonte-texto);
                margin: 2.5em 0;
            }
            .container__button{
                background-color: var(--cor-de-fundo);
                color: var(--preto-texto);
                text-decoration: none;
                border: var(--preto-texto) 1px solid;
                border-radius: 62em;
                padding: 1em;
                display: block;
                font-family: var(--fonte-texto);
                width: 10.75em;
                text-align: center;
            }
        </style>
    </head>
    <section class="principal">
        <img src="./src\img\Caranguejo.img.svg" alt="Imagem de um prato com caranguejo cozido" class="principal__caranguejo">
        <div class="principal__container">
            <h1 class="container__titulo">Cadastre suas próprias receitas em nosso site!</h1>
            <p class="container__texto"><b>Bem-vindo ao Panela e Ponto! - Compartilhe Suas Receitas!</b>

                Adora cozinhar e quer compartilhar suas criações com o mundo? No Panela e Ponto, você pode cadastrar suas próprias receitas e descobrir novas delícias preparadas por outros apaixonados pela culinária!

                Como Funciona?
                Cadastre-se – Crie sua conta gratuitamente e faça parte da nossa comunidade.
                Envie suas receitas – Compartilhe seus pratos favoritos, incluindo ingredientes, modo de preparo e fotos.
                Descubra e experimente – Navegue por uma variedade de receitas e encontre inspiração para suas próximas criações.
            </p>
            <a href="" class="container__button"><p>Vamos Lá!</p></a>
        </div>
    </section>