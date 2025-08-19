<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Resultado Final</title>
</head>
<body>
<div class="w3-container w3-teal">
<h1>
<?php
$n1 = $_POST['txtN1'];
$n2 = $_POST['txtN2'];
$n3 = $_POST['txtN3'];
$media = ($n1+$n2+$n3)/3;
$resultado;
echo "".$_POST['txtNome']."! Sua Média foi ".$media."!!! <br>";
if($media >= 7)
{
$resultado = "Aprovado";
}
else
{
$resultado = "Reprovado";
}
echo "Resultado:".$resultado."<br>";
?>
</h1> </div>
</body>
</html>