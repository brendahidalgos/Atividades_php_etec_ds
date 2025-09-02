<?php
$alunos = array(
    array("nome" => $_POST['aluno1'], "nota" => $_POST['nota1']),
    array("nome" => $_POST['aluno2'], "nota" => $_POST['nota2'])
);

echo "<h3>Notas dos Alunos:</h3>";
foreach ($alunos as $aluno) {
    echo "O(a) aluno(a) " . $aluno['nome'] . " tirou a nota " . $aluno['nota'] . "<br>";
}
?>