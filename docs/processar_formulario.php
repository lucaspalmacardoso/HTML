<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $interesses = $_POST["interesses"];
    $mensagem = $_POST["mensagem"];
    $cep = $_POST["cep"];

    // Conectar ao banco de dados
    $conexao = new mysqli("localhost", "root", "", "turismo_db");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Inserir dados na tabela
    $sql = "INSERT INTO formulario (nome, email, telefone, idade, sexo, interesses, mensagem, cep) 
            VALUES ('$nome', '$email', '$telefone', $idade, '$sexo', '$interesses', '$mensagem', '$cep')";

    if ($conexao->query($sql) === TRUE) {
        echo "<p>Dados inseridos no banco de dados com sucesso.</p>";
    } else {
        echo "Erro na inserção de dados: " . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();
} else {
    header("Location: formulario.html");
    exit();
}

?>
