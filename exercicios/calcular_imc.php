<?php
if (isset($_POST['peso']) && isset($_POST['altura'])) {
    // Obtenha os valores do formulário
    $peso = floatval($_POST['peso']);
    $altura = floatval($_POST['altura']);

    // Calcule o IMC
    $imc = $peso / ($altura * $altura);

    // Classifique o IMC
    $classificacao = "";
    if ($imc < 18.5) {
        $classificacao = "Abaixo do peso";
    } elseif ($imc >= 18.5 && $imc < 24.9) {
        $classificacao = "Peso saudavel";
    } elseif ($imc >= 25 && $imc < 29.9) {
        $classificacao = "Sobrepeso";
    } elseif ($imc >= 30 && $imc < 34.9) {
        $classificacao = "Obesidade grau 1";
    } elseif ($imc >= 35 && $imc < 39.9) {
        $classificacao = "Obesidade grau 2";
    } else {
        $classificacao = "Obesidade grau 3";
    }

    // Criar um array com os resultados
    $resultado = array(
        'imc' => number_format($imc, 2),
        'classificacao' => $classificacao
    );

    // Converter o array em JSON
    $json_resultado = json_encode($resultado);

    // Exibir o JSON
    echo $json_resultado;
} else {
    echo "Por favor, preencha o peso e a altura.";
}
?>
