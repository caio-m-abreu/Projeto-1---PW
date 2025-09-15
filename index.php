<?php

#Cabeçalho
include 'header.php';

$pagina = $_GET['bbb'] ?? 'home'; // evita warning

switch ($pagina) {
    case 'home': include 'views/home.php'; break;
    case 'contatos': include 'views/contacts.php'; break;
    case 'sobre': include 'views/info.php'; break;
    case 'receitas': include 'views/recipes.php'; break;
    case 'login': include 'views/login.php'; break;
    case 'cadastrar': include 'views/cadastrar.php'; break;
    case 'perfil': include 'views/perfil.php'; break;
    case 'mensagem': include 'views/message.php'; break;
    case 'suasreceitas': include 'views/listar_recipes.php'; break;
    case 'ver_receita': include 'views/ver_receita.php'; break;
    case 'editar_receita': include 'views/editar_receita.php'; break;
    case 'deletar_receita': include 'controllers/controller_deletar_receita.php'; break;
    default: include 'views/home.php'; break;
}

#Rodapé
include 'footer.php';