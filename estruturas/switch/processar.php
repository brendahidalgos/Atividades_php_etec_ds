<?php
$fruta = $_POST['fruta'];

switch ($fruta) {
    case "banana":
        echo "Você escolheu uma Banana!";
        break;
    case "maca":
        echo "Você escolheu uma Maçã!";
        break;
    case "laranja":
        echo "Você escolheu uma Laranja!";
        break;
    default:
        echo "Fruta desconhecida.";
}
?>