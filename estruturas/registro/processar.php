<?php
class Pessoa {
    public $nome;
    public $idade;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getDados() {
        return "Nome: " . $this->nome . ", Idade: " . $this->idade;
    }
}

$nome = $_POST['nome'];
$idade = $_POST['idade'];

$pessoa = new Pessoa($nome, $idade);

echo "<h3>Dados do Registro:</h3>";
echo $pessoa->getDados();
?>