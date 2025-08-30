<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_receita = $_POST["nome_receita"] ?? '';
    $descricao = $_POST["descricao"] ?? '';
    $ingredientes = $_POST["ingredientes"] ?? '';
    $utensilios = $_POST["utensilios"] ?? '';
    $etapa1 = $_POST["etapa1"] ?? '';
    $etapa2 = $_POST["etapa2"] ?? '';
    $etapa3 = $_POST["etapa3"] ?? '';

    // Verifica se os campos obrigatórios estão preenchidos
    if ($nome_receita && $descricao && $ingredientes && $utensilios) {
        
        $sql = "INSERT INTO receitas (nome_receita, descricao, ingredientes, utensilios, etapa1, etapa2, etapa3) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $nome_receita, $descricao, $ingredientes, $utensilios, $etapa1, $etapa2, $etapa3);

        if ($stmt->execute()) {
            $id_receita = $stmt->insert_id; // pega o ID gerado automaticamente

            // Se quiser já guardar na sessão, exemplo:
            $_SESSION["ultima_receita"] = [
                "id" => $id_receita,
                "nome" => $nome_receita
            ];

            header("Location: ../index.php?bbb=mensagem");
            exit();
        } else {
            echo "Erro ao cadastrar receita: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Preencha todos os campos obrigatórios!";
    }

    $conn->close();
} else {
    header("Location: index.php?bbb=cadastrar_receita");
    exit();
}
?>
