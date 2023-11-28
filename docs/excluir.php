<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Recuperar o ID do registro a ser excluído
    $id = $_GET["id"];

    // Conectar ao banco de dados
    $conexao = new mysqli("localhost", "root", "", "turismo_db");

    // Verificar a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Consulta para excluir o registro
    $sql = "DELETE FROM formulario WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Registro excluído com sucesso.';
        echo '</div>';

        // Adicionando um botão "Voltar" estilizado
        echo '<a href="mostrar_dados.php" class="btn btn-primary">Voltar para Mostrar Dados</a>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Erro na exclusão do registro: ' . $conexao->error;
        echo '</div>';
    }

    // Fechar a conexão
    $conexao->close();
} else {
    // Redirecionar se não houver ID ou não for uma solicitação GET
    header("Location: mostrar_dados.php");
    exit();
}
?>
