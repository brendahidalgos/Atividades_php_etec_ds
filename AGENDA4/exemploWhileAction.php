<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Tabuada</title>
</head>
<body>
    <?php
    echo '<br><a href="exemplo3.html" class="w3-button w3-
    teal">Voltar</a><br>';
    $v = $_POST["txtValor"];
    echo '<div class="w3-quarter w3-display-middle w3-responsive w3-
    teal">';
    echo '<table class="w3-table-all w3-hoverable w3-text-black">';
    echo '<tr class="w3-teal ">';
    echo '<th class="w3-center"> Tabuada do '.$v.'</th>';
    echo '</tr>';
    $i = 0;
    while($i<=10)
    {
    echo '<tr>';
    echo '<td class="w3-center">'.$v.' X '.$i.' = '.$v*$i.'</td>';
    echo '</tr>';
    $i++;
    }
    echo '</table>';
    echo '</div>';
    ?>
</body>
</html>