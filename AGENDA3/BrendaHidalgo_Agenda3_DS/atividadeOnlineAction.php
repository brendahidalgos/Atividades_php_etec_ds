<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Resultado da Promoção</title>
</head>
<body>
    <?php
        //receber os dados do formulário
        $nomeCliente = $_POST['txtNome'];
        $valorCompra = $_POST['txtValorCompra'];
        $formaPagamento = $_POST['cmbPag'];
        //variáveis
        $valorComDesconto = 0;
        $descontoPorcentagem = 0;
        $valorDoDesconto = 0;
        
        if ($formaPagamento == 'deposito') {
            $descontoPorcentagem = 10;
        } elseif ($formaPagamento == 'boleto') {
            $descontoPorcentagem = 8;
        } else { //se a forma de pagamento não for boleto ou depósito, será cartão de crédito
            $descontoPorcentagem = 0;
        }
        //valor do desconto e o valor final
        $valorDoDesconto = ($valorCompra * $descontoPorcentagem) / 100;
        $valorComDesconto = $valorCompra - $valorDoDesconto;       
    ?>
    <div class="w3-panel w3-blue w3-round-xlarge w3-card-4 w3-content">
        <h2 style="text-align: center;">PROMOÇÃO DE MÊS DE ANIVERSÁRIO!</h2>
    </div>
    <div class="w3-panel w3-blue w3-round-xlarge w3-card-4 w3-content" style="padding: 20px; margin-top:20px;">
        <div class="w3-row">
            <div class="w3-half">           
                <p><strong><?php echo $nomeCliente; ?> !</strong></p>
                <p>Valor da Compra Sem Desconto: R$ <?php echo number_format($valorCompra, 2, ',', '.'); ?></p>
                <p>Forma de Pagamento escolhida: 
                <?php 
                    //troca o valor da variável para um texto mais amigável para o usuário
                    if ($formaPagamento == 'cartaoCredito') {
                        echo 'Cartão de Crédito';
                    } elseif ($formaPagamento == 'boleto') {
                        echo 'Boleto';
                    } else {
                        echo 'Depósito';
                    }
                ?>
                </p>
                <p>Desconto de: <?php echo $descontoPorcentagem; ?>%</p>
                <p>Você economizou: R$ <?php echo number_format($valorDoDesconto, 2, ',', '.'); ?></p>
                <p>Valor à Pagar: R$ <?php echo number_format($valorComDesconto, 2, ',', '.'); ?></p>
                <button class="w3-btn w3-blue-grey" onclick="history.back()">Voltar</button>
            </div>
        </div>
    </div>    
    <div class="w3-panel w3-blue w3-round-xlarge w3-card-4 w3-content">
        <p>Comentários: </p>
        <ol start="1">
            <li>Receber os dados do formulário</li>
            <li>Definir as variáveis de desconto e valor final</li>
            <li>Estrutura de decisão usando if, elseif e else</li>
            <li>Calcular o valor do desconto e o valor final</li>
            <li>Exibir o resultado na tela</li>            
        </ol>
        <p>Obs: O desconto é aplicado apenas para pagamentos à vista.</p>  
        <p style="text-align: center;">Desenvolvido por <a href="https://github.com/brendahidalgos" target="_blank">Brenda Hidalgo</a></p>
    </div>         
</body>
</html>