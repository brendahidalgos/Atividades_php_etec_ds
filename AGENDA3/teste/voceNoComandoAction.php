<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Resultado</title>
</head>
<body>
<div class="w3-container w3-teal">
<h1>
    <?php
    $sal = $_POST['txtSal'];
    $dep = $_POST['txtDep'];
    $por;
    if($sal <= 500 && $dep <=5){
    $por = 15;
    }
    elseif($sal <= 500 && $dep > 5)
    {
    $por = 20;
    }
    elseif($sal <= 1000 && $dep <=5)
    {
    $por = 10;
    }
    elseif($sal <= 1000 && $dep > 5){
    $por = 15;
    }
    elseif($sal <= 2000 && $dep <=5){
    $por = 10;
    }
    elseif($sal <= 2000 && $dep > 5){
    $por = 12;
    }
    elseif($dep <=5){
        $por = 8;
    }
    else {
        $por = 10;
    }
    echo"".$_POST['txtNome']."! <br> ";
    echo "Você terá ".$por."% de aumento, resultara no valor de R$ ".($por* $sal / 100)."<br>";
    echo "Seu novo Salário: R$ ".($sal +$por * $sal / 100)."<br>";
    ?>
</h1>
</div>
</body>
</html>