<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processa Cadastro</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>    
    <h1 class="reh1">Processo de Cadastro</h1>
    <section class="resection">        
        <div class="reform">
            <p class="rep">
                <?php echo "Seu nome é: ".$_POST['nome']."<br>";            
                echo "Sua profissão é: ".$_POST['profissao']."<br>";
                echo "Pretensão Salarial: R$".$_POST['salario']."<br>";
                echo "Experiências anteriores: ".$_POST['experiencia']."<br>";
                echo "<br>";?>
            </p>
            <h2>Dificuldades no Exercício Proposto</h2>
            <ul class="reul">
                <li>Frameworks - desenvolvo a maioria das vezes em css puro</li>
                <li>JavaScript - tudo (tive que pesquisar inclusive),como eu mostro uma frase caso a pessoa não escreva nada em "experiências anteriores"</li>
                <li>PHP - somente na concatenação e na organização do código, por misturar html e php</li>
            </ul>            
            <br>
            <input type="button" value="Voltar" name="voltar" id="voltar" onclick="history.back()">
        </div>
    </section>   
</body>
</html>