<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processa Cadastro</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-pale-blue">
    <div class="w3-container w3-center w3-margin-top">
        <h1 class="w3-text-black" style="text-shadow:1px 1px 0 #493838bb">Cadastro Realizado!</h1>
    </div>
    <div class="w3-card-4 w3-white w3-margin-top w3-margin-bottom w3-padding w3-container w3-content w3-round-large" style="max-width:700px;">
        <div class="w3-container">
            <p>
                <?php
                // Verifica se o campo de texto foi preenchido, senão usa o radio
                if (!empty($_POST['sexo_texto'])) {
                    $sexo = $_POST['sexo_texto'];
                } else {
                    $sexo = $_POST['sexo'];
                }
                // Verifica se o campo foi preenchido, senão usa "Sem experiência"
                $experiencia = trim($_POST['experiencia']);
                if (empty($experiencia)) {
                    $experiencia = "Sem experiência!";
                }
                echo "Seu nome é: ".$_POST['nome']."<br>";
                echo "Sua idade é: ".$_POST['idade']." anos <br>";
                echo "Sexo: ".$sexo."<br>";
                echo "E-mail: ".$_POST['email']."<br>";
                echo "Profissão: ".$_POST['profissao']."<br>";
                echo "Pretensão Salarial: R$".$_POST['salario']."<br>";
                echo "Experiências anteriores: ".($experiencia);
                echo "<br>";?>
            </p>

            <h2 class="w3-border-bottom w3-padding-small">Desafios no Exercício Proposto:</h2>
            <div class="w3-panel w3-border w3-padding w3-round-large">
                <p class="w3-large w3-text-teal">PHP</p>
                <ul class="w3-ul w3-margin-bottom">
                    <li>Concatenação e na organização do código, por misturar html e php.</li>
                    <li>Como verificar se no campo "sexo" tem marcado um "radio" ou tem algo escrito no campo "text".</li>
                    <li>Como mostrar uma frase automática com "Sem experiência", caso a pessoa não escreva nada em "experiências anteriores".</li>
                </ul>  
            </div>

            <h2 class="w3-border-bottom w3-padding-small w3-margin-top">Organização dos dados no formulário:</h2>
            <p>Eu pensei em como uma pessoa faria esse cadastro e quais os dados principais um recrutador precisaria. Porém, acho que faltou Estado e Cidade se fosse uma empresa nacional e não regional.</p>
            <button class="w3-button w3-dark-gray w3-hover-gray w3-round-large w3-section" onclick="history.back()">Voltar</button>
        </div>
    </div>

    <footer class="w3-container w3-center w3-margin-top w3-pale-blue">
        <p>&copy; 2025 <a href="https://github.com/brendaHidalgos" class="w3-text-black">Brenda Hidalgo</a></p>
    </footer>
</body>
</html>