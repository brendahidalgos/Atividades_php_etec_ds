<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processa Cadastro</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>    
    <section class="resection">
        <div class="reform">
            <?php
            echo "Seu nome é: ".$_POST['nome']."<br>";
            echo "Sua profissão é: ".$_POST['profissao']."<br>";
            echo "Pretensão Salárial: R$".$_POST['salario']."<br>";
            echo "Experiências anteriores: ".$_POST['experiencia']."<br>";
            echo "<br>";
            echo "A dificuldade no desenvolvimento do código foi no arquivo processaCadastro.php em que a organização (sequência) é fundamental para não dar erro, principalmente na concatenação.   e a escolha de Qual foi o maior desafio ao desenvolver o código. Como decidiu organizar os dados no formulário.";
            ?>
        </div>
    </section>   
</body>
</html>