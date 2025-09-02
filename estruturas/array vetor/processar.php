<?php
$nomes = array($_POST['nome1'], $_POST['nome2'], $_POST['nome3']);

echo "<h3>Nomes inseridos:</h3>";
foreach ($nomes as $nome) {
    echo $nome . "<br>";
}
?>