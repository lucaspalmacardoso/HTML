<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"]; // Lembre-se de aplicar hash e verificar a senha de forma segura

    // Verificar se o login é válido (exemplo simples, você deve implementar a verificação segura)
    if ($email == "seu@email.com" && $senha == "suasenha") {
        echo "Login bem-sucedido!";
    } else {
        echo "Email ou senha incorretos.";
    }
} else {
    header("Location: mostra_dados.php");
    exit();
}
?>
