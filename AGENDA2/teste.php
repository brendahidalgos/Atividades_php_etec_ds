<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processa Cadastro</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background-color: black; /* Fundo preto */
        }
    </style>
</head>
<body>
<!-- Container centralizado na tela -->
<div class="w3-display-container" style="height:100vh">
    <div class="w3-display-middle" style="width:90%; max-width:600px">
        <div class="w3-card w3-round-large w3-padding w3-pink">
            <?php
            echo "Seu nome é: " . $_POST['nome'] . "<br>";
            echo "Sua profissão é: " . $_POST['profissao'] . "<br>";
            echo "Pretensão Salárial: R$" . $_POST['salario'] . "<br>";
            echo "Experiências anteriores: " . $_POST['experiencia'] . "<br><br>";
            echo "A dificuldade no desenvolvimento do código foi no arquivo processaCadastro.php em que a organização (sequência) é fundamental para não dar erro, principalmente na concatenação. e a escolha de Qual foi o maior desafio ao desenvolver o código. Como decidiu organizar os dados no formulário.";
            ?>
        </div>
    </div>
</div>
</body>
</html>
