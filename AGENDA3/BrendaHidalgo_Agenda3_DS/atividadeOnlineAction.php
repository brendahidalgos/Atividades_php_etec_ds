<?php   
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
            case 'deposito':
                $porcentagemDesconto = 10;
                break;
            case 'boleto':
                $porcentagemDesconto = 8;
                break;
            case 'cartaoCredito':
            default:
                $porcentagemDesconto = 0;
                break;
        }
        //calculos do desconto e valor final
        $valorDesconto = $valorCompra * ($porcentagemDesconto / 100);
        $valorAPagar = $valorCompra - $valorDesconto;

    } else {
        // Se a página for acessada diretamente, define valores padrão
        $nomeCliente = "Aguardando formulário";
        $valorCompra = 0;
        $formaPagamento = "desconhecida"; // Mantemos essa variável para uso
        $porcentagemDesconto = 0;
        $valorDesconto = 0;
        $valorAPagar = 0;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Atividade Online</title>
</head>
<body>
    <div class="w3-container w3-teal">
        <h2>Valor da compra</h2>
    </div>
    <div class="w3-container w3-teal" style="padding:20px; text-align: left;">
        <h2>PROMOÇÃO DE MÊS DE ANIVERSÁRIO!</h2>
        <p><strong><?php echo $nomeCliente; ?> !</strong></p>
        <p>Valor da Compra Sem Desconto: R$ <?php echo number_format($valorCompra, 2, ',', '.'); ?></p>
        <p>Forma de Pagamento escolhida:
            <?php
                // Nova lógica para traduzir a forma de pagamento
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
        <p>Desconto de: <?php echo $porcentagemDesconto; ?>%</p>
        <p>Você economizou: R$ <?php echo number_format($valorDesconto, 2, ',', '.'); ?></p>
        <p>Valor a Pagar: R$ <?php echo number_format($valorAPagar, 2, ',', '.'); ?></p>
    </div>
</body>
</html>