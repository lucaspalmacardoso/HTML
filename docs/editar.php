<?php
// Conectar ao banco de dados
$conexao = new mysqli("localhost", "root", "", "turismo_db");

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Consulta para obter os dados do registro selecionado
    $sql = "SELECT * FROM formulario WHERE id = $id";
    $resultado = $conexao->query($sql);

    // Fechar a conexão
    $conexao->close();

    // Verificar se o registro existe
    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
    } else {
        // Redirecionar se o registro não existir
        header("Location: mostrar_dados.php");
        exit();
    }
} else {
    // Redirecionar se não houver ID
    header("Location: mostrar_dados.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Adicione outros estilos conforme necessário -->
</head>
<body>

<div class="container mt-5">
    <h1>Editar Dados</h1>
    <form action="atualizar.php" method="post">
        <!-- Adicione campos do formulário e preencha com os dados existentes -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>">
        </div>
        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $row['idade']; ?>">
        </div>
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select class="form-control" id="sexo" name="sexo">
                <option value="masculino" <?php if($row['sexo'] == 'masculino') echo 'selected'; ?>>Masculino</option>
                <option value="feminino" <?php if($row['sexo'] == 'feminino') echo 'selected'; ?>>Feminino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="interesses">Interesses:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="interesse1" name="interesses[]" value="esportes" <?php if(in_array('esportes', explode(',', $row['interesses']))) echo 'checked'; ?>>
                <label class="form-check-label" for="interesse1">Dicas</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="interesse2" name="interesses[]" value="música" <?php if(in_array('música', explode(',', $row['interesses']))) echo 'checked'; ?>>
                <label class="form-check-label" for="interesse2">Passeios</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="interesse3" name="interesses[]" value="cinema" <?php if(in_array('cinema', explode(',', $row['interesses']))) echo 'checked'; ?>>
                <label class="form-check-label" for="interesse3">Eventos</label>
            </div>
        </div>
        <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea class="form-control" id="mensagem" name="mensagem" rows="4"><?php echo $row['mensagem']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" class="form-control" id="cep" name="cep" maxlength="9" value="<?php echo $row['cep']; ?>">
        </div>

        <!--  exibir os resultados -->
        <div id="resultadoCEP" class="mt-4"></div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
