<?php
$numero = $_POST['numero'];
$i = 0;

do {
    echo "O número é " . $numero . ". Este loop sempre roda pelo menos uma vez.<br>";
    $i++;
} while ($i < $numero);
?>