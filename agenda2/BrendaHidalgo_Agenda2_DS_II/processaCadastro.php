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
                // Verifica se o campo de texto foi preenchido, senão usa o radio
                if (!empty($_POST['sexo_texto'])) {
                    $sexo = $_POST['sexo_texto'];
                } else {
                    $sexo = $_POST['sexo'];
                }
                $experiencia = trim($_POST['experiencia']);
                if (empty($experiencia)) {
                    $experiencia = "Sem experiência!";
                }
                echo "Seu nome é: ".$_POST['nome']."<br>";   
                echo "Sexo: ".$sexo."<br>";
                echo "E-mail: ".$_POST['email']."<br>";
                echo "Profissão: ".$_POST['profissao']."<br>";
                echo "Pretensão Salarial: R$".$_POST['salario']."<br>";
                echo "Experiências anteriores: " .($experiencia);
                echo "<br>";?>
            </p>
            <h2>Desafios no Exercício Proposto:</h2>
            <ul class="reul">
                <p class="rep">PHP</p>
                <li>Concatenação e na organização do código, por misturar html e php.</li>
                <li>Como verificar se no campo "sexo" tem marcado um "radio" ou tem algo escrito no campo "text".</li>
                <li>Como mostrar uma frase automática com "Sem experiência", caso a pessoa não escreva nada em "experiências anteriores".</li>
                <br>
                <p class="rep">Frameworks</p>
                <li>Frameworks - decidi não usar frameworks porque estudei durante as férias CSS puro, e resolvi por em prática (gostei bastante).</li>
                <br>
                <p class="rep">JavaScript</p>
                <li>Não tenho prática, tive que pesquisar no endereço: <a href="https://www.google.com/search?q=quero+que+no+html+quando+eu+clicar+no+input+text+ele+tira+a+sele%C3%A7%C3%A3o+do+radio+com+javascript&oq=quero+que+no+html+quando+eu+clicar+no+input+text+ele+tira+a+sele%C3%A7%C3%A3o+do+radio+com+javascript&gs_lcrp=EgZjaHJvbWUyBggAEEUYOdIBCDQ5NDBqMGoxqAIAsAIA&sourceid=chrome&ie=UTF-8" target="_blank">clique aqui</a>, para tirar a seleção do campo "radio" caso o campo "text" tenha algo escrito.</li>
            </ul>            
            <br>
            <h2>Organização dos dados no formulário:</h2>
            <p style="text-align:left;">Eu pensei em como uma pessoa faria esse cadastro e quais os dados principais um recrutador precisaria. Porém, acho que faltou Estado e Cidade se fosse uma empresa nacional e não regional.</p>
            <input type="button" value="Voltar" name="voltar" id="voltar" onclick="history.back()">
        </div>
    </section>   
    <footer>
        <p>&copy; 2025 <a href="https://github.com/brendaHidalgos">Brenda Hidalgo</a></p>
    </footer>
</body>
</html>