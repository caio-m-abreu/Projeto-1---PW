<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? '';
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    // Verifica se os campos estão preenchidos
    if ($nome && $email && $senha) {
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Define uma imagem de perfil padrão
        $foto_padrao = 'src/img/tung.jpg'; // ou qualquer caminho relativo à imagem padrão

        // Insere no banco
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha_criptografada);

        if ($stmt->execute()) {
            // Pega o ID inserido
            $id_usuario = $stmt->insert_id;

            // Cria sessão
            $_SESSION["usuario"] = [
                "id" => $id_usuario,
                "nome" => $nome,
                "email" => $email,
                "foto" => $foto_padrao
            ];

            // Redireciona para a home
            header("Location: ../index.php?bbb=mensagem");
            exit();
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Preencha todos os campos!";
    }

    $conn->close();
} else {
    header("Location: index.php?bbb=cadastrar");
    exit();
}
?>