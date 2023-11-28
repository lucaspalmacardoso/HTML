<?php
// Conectar ao banco de dados
$conexao = new mysqli("localhost", "root", "", "turismo_db");

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Consulta para obter todos os registros
$sql = "SELECT * FROM formulario";
$resultado = $conexao->query($sql);

// Fechar a conexão
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Cadastrados</title>

    <!-- Adicione o link para o ícone/favicon -->
    <link rel="icon" href="./image/logo.png" type="image/x-icon">

    <!-- Adicione o link para o arquivo CSS do Bootstrap (se ainda não tiver feito) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Adicione seu próprio arquivo CSS personalizado -->
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>

<!-- Barra de Navegação Responsiva -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="./index.html"> <img src="./image/logo.png" width="170" height="70"> <h1></h1> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
    </div>
   
</nav>

<div class="container mt-5">
    <h1>Dados Cadastrados</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Idade</th>
                <th>Sexo</th>
                <th>Interesses</th>
                <th>Mensagem</th>
                <th>CEP</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop para exibir os dados
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nome']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['telefone']}</td>";
                echo "<td>{$row['idade']}</td>";
                echo "<td>{$row['sexo']}</td>";
                echo "<td>{$row['interesses']}</td>";
                echo "<td>{$row['mensagem']}</td>";
                echo "<td>{$row['cep']}</td>";
                echo "<td>";
                echo "<a href='editar.php?id={$row['id']}'>Editar</a>";
                echo " | ";
                echo "<a href='excluir.php?id={$row['id']}' class='btn btn-danger btn-sm'>Excluir</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Rodapé do Site -->
<footer class="text-center">
    <p>&copy; 2023 Turismo São Paulo</p>
</footer>

<!-- Scripts do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Link para o Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Link para o Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</body>
</html>
