<?php
session_start();
include '../db.php';

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php?bbb=login");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION["usuario"]["id"];
    $nome = $_POST["nome"] ?? '';
    $email = $_POST["email"] ?? '';
    $nova_senha = $_POST["nova_senha"] ?? '';

    if ($nome && $email) {
        // Atualiza nome e email
        $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nome, $email, $id);
        $stmt->execute();

        // Atualiza senha se foi preenchida
        if (!empty($nova_senha)) {
            $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
            $stmt->bind_param("si", $senha_hash, $id);
            $stmt->execute();
        }

        // Atualiza foto de perfil se foi enviada
        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
            $extensao = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
            $novo_nome = uniqid() . "." . $extensao;
            $caminho = "src/img/uploads/" . $novo_nome;

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], "../" . $caminho)) {
                $stmt = $conn->prepare("UPDATE usuarios SET foto = ? WHERE id = ?");
                $stmt->bind_param("si", $caminho, $id);
                $stmt->execute();

                $_SESSION["usuario"]["foto"] = $caminho;
            }
        }

        // Atualiza dados da sessão
        $_SESSION["usuario"]["nome"] = $nome;
        $_SESSION["usuario"]["email"] = $email;

        header("Location: ../index.php?bbb=perfil&sucesso=1");
        exit();
    } else {
        // Caso falte nome ou email
        header("Location: ../index.php?bbb=perfil&erro=1");
        exit();
    }

    $conn->close();
} else {
    header("Location: ../index.php?bbb=perfil");
    exit();
}