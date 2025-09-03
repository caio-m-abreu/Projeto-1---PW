<?php
include './db.php'; // conecta ao banco

// Busca as receitas
$sql = "SELECT id_receita, nome_receita, descricao 
        FROM receitas ORDER BY id_receita DESC";
$result = $conn->query($sql);

// Deixa o resultado disponível para a view
$receitas = [];
if ($result && $result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
        $receitas[] = $linha;
    }
}

$conn->close();