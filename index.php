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
    default: include 'views/home.php'; break;
}

#Rodapé
include 'footer.php';