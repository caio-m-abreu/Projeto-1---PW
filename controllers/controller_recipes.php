<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db.php';

// Protege a página: apenas usuários logados podem cadastrar
if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php?bbb=cadastrar");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_receita = $_POST["nome_receita"] ?? '';
    $descricao    = $_POST["descricao"] ?? '';
    $ingredientes = $_POST["ingredientes"] ?? '';
    $utensilios   = $_POST["utensilios"] ?? '';
    $etapa1       = $_POST["etapa1"] ?? '';
    $etapa2       = $_POST["etapa2"] ?? '';
    $etapa3       = $_POST["etapa3"] ?? '';

    // Verifica se os campos obrigatórios estão preenchidos
    if ($nome_receita && $descricao && $ingredientes && $utensilios) {

        // ID do usuário logado
        $usuario_id = $_SESSION['usuario']['id'];

        // Insere no banco com o usuario_id
        $sql = "INSERT INTO receitas (nome_receita, descricao, ingredientes, utensilios, etapa1, etapa2, etapa3, usuario_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssssi",
            $nome_receita,
            $descricao,
            $ingredientes,
            $utensilios,
            $etapa1,
            $etapa2,
            $etapa3,
            $usuario_id
        );

        if ($stmt->execute()) {
            $id_receita = $stmt->insert_id;

            // Opcional: salvar a última receita na sessão
            $_SESSION["ultima_receita"] = [
                "id" => $id_receita,
                "nome" => $nome_receita
            ];

            header("Location: ../index.php?bbb=mensagem"); // redireciona após cadastro
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