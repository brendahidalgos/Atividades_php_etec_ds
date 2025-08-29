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
    echo '<br><a href="exemplo4.html" class="w3-button w3-
    teal">Voltar</a><br>';
    $i = 0;
    $j = 0;
    do{
    echo '<div class="w3-quarter w3-responsive w3-teal">';
    echo '<table class="w3-table-all w3-hoverable w3-text-black">';
    echo '<tr class="w3-teal ">';
    echo '<th class="w3-center"> Tabuada do '.$j.'</th>';
    echo '</tr>';
    $i = 0;
    do{
    echo '<tr>';
    echo '<td class="w3-center">'.$j.' X '.$i.' = '.$j*$i.'</td>';
    echo '</tr>';
    $i++;
    }while($i<=10);
    echo '</table>';
    echo '</div>';
    $j++;}while($j<=10);
    ?>
</body>
</html>