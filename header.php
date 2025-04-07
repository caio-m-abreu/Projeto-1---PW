<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panela e... Ponto!</title>
        <link rel="stylesheet" href="src/styles/style.css">
    </head>
    <body>
        <header class="cabecalho">
            <!-- Botão de menu -->
            <button id="btn-menu" class="cabecalho__menu">
            <img src="src/img/Menu.svg" alt="menu">
            </button>

            <!-- Logo -->
            <a href="?bbb=home">
            <img src="src/img/Logo-Panela-Ponto 1.svg" alt="Logo do Site" class="cabecalho__logo">
            </a>

            <div class="user-dropdown">
                <img src="src/img/Icon-Login.svg" id="btn-user" alt="Ícone de Usuário">

                <ul id="menu-user" class="dropdown-menu">
                    <li><a href="?bbb=login">Entrar</a></li>
                    <li><a href="?bbb=cadastrar">Cadastrar</a></li>
                </ul>
            </div>
        </header>

        <!-- Menu lateral oculto -->
        <nav id="menu-lateral" class="fechado">
            <ul>
            <li><a href="?bbb=home">Home</a></li>
            <li><a href="?bbb=sobre">Sobre</a></li>
            <li><a href="?bbb=receitas">Cadastrar Receita</a></li>
            <li><a href="?bbb=contatos">Contatos</a></li>
            </ul>
        </nav>