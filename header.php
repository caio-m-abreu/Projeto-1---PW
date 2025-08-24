<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panela e... Ponto!</title>
    <link rel="stylesheet" href="styles.css">
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
            <?php
            if (isset($_SESSION["usuario"])) {
                $foto = $_SESSION["usuario"]["foto"] ?? 'assets/img/default-user.png';
                $nome = $_SESSION["usuario"]["nome"];
                echo "<img src='$foto' id='btn-user' alt='Foto do usuário' class='usuario-logado' title='$nome'>";
                echo "
                    <ul id='menu-user' class='dropdown-menu'>
                        <li><a href='?bbb=perfil'>Perfil</a></li>
                        <li><a href='controllers/logout.php'>Sair</a></li>
                    </ul>
                ";
            } else {
                echo '<img src="src/img/Icon-Login.svg" id="btn-user" alt="Ícone de Usuário">';
                echo '
                    <ul id="menu-user" class="dropdown-menu">
                        <li><a href="?bbb=login">Entrar</a></li>
                        <li><a href="?bbb=cadastrar">Cadastrar</a></li>
                    </ul>
                ';
            }
            ?>
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
