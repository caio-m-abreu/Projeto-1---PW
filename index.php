<?php

#Cabeçalho
include 'header.php';

$pagina = $_GET['bbb'];

switch ($pagina) {

    case 'home': include 'views/home.php';break;
    case 'contatos': include 'views/contacts.php'; break;
    case 'sobre': include 'views/info.php'; break;
    case 'ajuda': include 'views/help.php'; break;
    default: include 'views/home.php';
    break;
}

#Rodapé
include 'footer.php';