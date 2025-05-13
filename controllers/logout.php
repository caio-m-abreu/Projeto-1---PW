<?php
session_start();

// Destroi todas as variáveis de sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a home
header("Location: ../index.php?bbb=home");
exit();