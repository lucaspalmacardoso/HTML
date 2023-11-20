<?php

// Conectar ao banco de dados
$conexao = new mysqli("localhost", "root", "", "turismo_db");

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Consulta SQL para obter todos os dados da tabela
$sql = "SELECT * FROM formulario";
$resultado = $conexao->query($sql);

// Verificar se há resultados
if ($resultado->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Idade</th><th>Sexo</th><th>Interesses</th><th>Mensagem</th><th>CEP</th></tr>";
    
    // Loop através dos resultados e exibir os dados
    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $linha["id"] . "</td>";
        echo "<td>" . $linha["nome"] . "</td>";
        echo "<td>" . $linha["email"] . "</td>";
        echo "<td>" . $linha["telefone"] . "</td>";
        echo "<td>" . $linha["idade"] . "</td>";
        echo "<td>" . $linha["sexo"] . "</td>";
        echo "<td>" . $linha["interesses"] . "</td>";
        echo "<td>" . $linha["mensagem"] . "</td>";
        echo "<td>" . $linha["cep"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechar a conexão
$conexao->close();

?>
