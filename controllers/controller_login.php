<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    if ($email && $senha) {
        // Busca o usuário no banco pelo email
        $sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            // Verifica a senha
            if (password_verify($senha, $usuario['senha'])) {
                // Define imagem padrão para todos (você pode salvar no banco depois)
                $foto_padrao = 'src/img/tung.jpg';

                // Cria sessão
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nome' => $usuario['nome'],
                    'email' => $usuario['email'],
                    'foto' => $foto_padrao
                ];

                header("Location: ../index.php?bbb=home");
                exit();
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "E-mail não encontrado!";
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