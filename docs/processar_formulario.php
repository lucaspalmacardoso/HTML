<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $interesses = isset($_POST["interesses"]) ? implode(", ", $_POST["interesses"]) : "";
    $mensagem = $_POST["mensagem"];
    $cep = $_POST["cep"];

    // Processar os dados conforme necessário (por exemplo, enviar e-mail, armazenar em um banco de dados, etc.)

    // Exemplo de exibição dos dados (substitua isso com o seu próprio código)
    echo "<h2>Dados Recebidos:</h2>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Telefone:</strong> $telefone</p>";
    echo "<p><strong>Idade:</strong> $idade</p>";
    echo "<p><strong>Sexo:</strong> $sexo</p>";
    echo "<p><strong>Interesses:</strong> $interesses</p>";
    echo "<p><strong>Mensagem:</strong> $mensagem</p>";
    echo "<p><strong>CEP:</strong> $cep</p>";
} else {
    // Se alguém tentar acessar este arquivo diretamente, redirecione para o formulário
    header("Location: formulario.html");
    exit();
}
?>
