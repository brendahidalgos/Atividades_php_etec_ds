<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processa Cadastro</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>    
    <h1 class="reh1">Cadastro Realizado!</h1>
    <section class="resection">        
        <div class="reform">
            <p class="rep">
                <?php
                $experiencia = trim($_POST['experiencia']);
                if (empty($experiencia)) {
                    $experiencia = "Sem experiência!";
                }
                echo "Seu nome é: ".$_POST['nome']."<br>";            
                echo "Sua profissão é: ".$_POST['profissao']."<br>";
                echo "Pretensão Salarial: R$".$_POST['salario']."<br>";
                echo "Experiências anteriores: " .($experiencia);
                echo "<br>";?>
            </p>
            <h2>Dificuldades no Exercício Proposto:</h2>
            <ul class="reul">
                <li>Frameworks - desenvolvo a maioria das vezes em css puro, não consegui ainda ter prática em lembrar os códigos do W3schools.</li>                
                <li>PHP - Primeiro na concatenação e na organização do código, por misturar html e php. Segundo, como eu mostro uma frase caso a pessoa não escreva nada em "experiências anteriores".</li>
                <li>JavaScript - tudo, inclusive só pesquisando.</li>
            </ul>            
            <br>
            <input type="button" value="Voltar" name="voltar" id="voltar" onclick="history.back()">
        </div>
    </section>   
    <footer>
        <p>&copy; 2025 <a href="https://github.com/brendaHidalgos">Brenda Hidalgo</a></p>
    </footer>
</body>
</html>