<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    
    // Os interesses são um array, então você precisa processá-los corretamente
    $interesses = isset($_POST["interesses"]) ? implode(",", $_POST["interesses"]) : "";
    
    $mensagem = $_POST["mensagem"];
    $cep = $_POST["cep"];

    // Conectar ao banco de dados
    $conexao = new mysqli("localhost", "root", "", "turismo_db");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Atualizar dados na tabela
    $sql = "UPDATE formulario SET 
            nome = '$nome', 
            email = '$email', 
            telefone = '$telefone', 
            idade = $idade, 
            sexo = '$sexo', 
            interesses = '$interesses', 
            mensagem = '$mensagem', 
            cep = '$cep' 
            WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "<p>Dados atualizados no banco de dados com sucesso.</p>";
    } else {
        echo "Erro na atualização de dados: " . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();
} else {
    // Redirecionar se não for uma solicitação POST
    header("Location: mostrar_dados.php");
    exit();
}
?>
