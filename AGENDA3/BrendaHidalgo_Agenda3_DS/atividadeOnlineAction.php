<?php   
    //se os dados foram inseridos no formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //dados do formulario
        $nomeCliente = $_POST['txtNome'];
        $valorCompra = $_POST['txtValorCompra'];
        $formaPagamento = $_POST['cmbPag'];
        //variaveis
        $desconto = 0;
        $porcentagemDesconto = 0;
        //descontos
        switch ($formaPagamento) {
            case 'deposito': //deposito com 10%
                $porcentagemDesconto = 10;
                break;
            case 'boleto': //boleto com 8%
                $porcentagemDesconto = 8;
                break;
            case 'cartaoCredito': //crédito sem desconto
            default:
                $porcentagemDesconto = 0;
                break;
        }
        //calculos do desconto e valor final
        $valorDesconto = $valorCompra * ($porcentagemDesconto / 100);
        $valorAPagar = $valorCompra - $valorDesconto;

    } else {
        //se a página for acessada diretamente, define valores padrão
        $nomeCliente = "Aguardando formulário";
        $valorCompra = 0;
        $formaPagamento = "desconhecida"; // Mantemos essa variável para uso
        $porcentagemDesconto = 0;
        $valorDesconto = 0;
        $valorAPagar = 0;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Atividade Online</title>
</head>
<body>
    <div class="w3-container w3-teal">
        <h2>PROMOÇÃO DE MÊS DE ANIVERSÁRIO!</h2>
    </div>
    <div class="w3-container w3-teal" style="padding:20px; text-align: left;">        
        <p><?php echo $nomeCliente."!";?></p>
        <p>Valor da compra: R$ <?php echo number_format($valorCompra, 2, ',', '.'); ?></p>
        <p>Forma de Pagamento escolhida:
            <?php
                //lógica para traduzir a forma de pagamento
                switch ($formaPagamento) {
                    case 'deposito':
                        echo 'Depósito';
                        break;
                    case 'boleto':
                        echo 'Boleto';
                        break;
                    case 'cartaoCredito':
                        echo 'Cartão de Crédito';
                        break;
                    default:
                        echo 'Forma de Pagamento desconhecida';
                        break;
                }
            ?>
        </p>        
        <p>Desconto de: <?php echo $porcentagemDesconto;?>%</p>
        <p>Você economizou: R$ <?php echo number_format($valorDesconto, 2, ',', '.'); ?></p>
        <p>Valor a Pagar: R$ <?php echo "<strong>".number_format($valorAPagar, 2, ',', '.')."</strong>"; ?></p>
    </div>
    <!--Comentário:
        1- Inserir os dados do formulário
        2- Criar as 2 variaveis, uma de desconto e a outra porcentagem do desconto, essas variais começam com o valor zero
        3- Aplicar a estrutura de repetição Switch Case para determinar o valor de cada desconto de acordo com a escolha no formulário
        4- Calcular o desconto sob o valor da compra e subtrair para saber o valor total com desconto
        5- Se a página foi acessada sem passar para o formulário, exibe valores nulos
        6- Exibe o nome, valor da compra
        7- Aplicar aestrutura de decisão Switch Case para identificar qual método de pagamento foi escolhido para mostrar o valor
        8- Exibe o desconto já calculado anteriormente
        9- Exibe o valor de desconto
        10- Exibe o valor final com desconto já aplicado
    -->
</body>
</html>