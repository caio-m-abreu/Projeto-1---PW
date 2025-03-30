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
            .rodape{
                background-color: var(--laranja-box);
                height: 4em;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .rodape__texto{
                color: var(--branco-texto);
                font-family: var(--fonte-texto);
            }
            .imagem{
                height: 4em;
                width: 4em;
            }
        </style>
</head>
    <footer class="rodape">
            <p class="rodape__texto">© 2025 Panela e Ponto, Inc.</p>
    </footer>
    </body>
</html>