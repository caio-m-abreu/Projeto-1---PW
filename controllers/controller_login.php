<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    if ($email && $senha) {
        $sql = "SELECT id, nome, email, senha, foto FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($senha, $usuario["senha"])) {
            // Cria sessão com a foto correta
            $_SESSION["usuario"] = [
                "id" => $usuario["id"],
                "nome" => $usuario["nome"],
                "email" => $usuario["email"],
                "foto" => $usuario["foto"] ?? "src/img/tung.jpg" // fallback se estiver null
            ];

            header("Location: ../index.php?bbb=home");
            exit();
        } else {
            echo "⚠ E-mail ou senha incorretos!";
        }

        $stmt->close();
    } else {
        echo "Preencha todos os campos!";
    }

    $conn->close();
} else {
    header("Location: ../index.php?bbb=login");
    exit();
}