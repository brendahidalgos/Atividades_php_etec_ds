<?php
/*array bidimensional inicial que contém os dados dos alunos*/
$turma8A = [
    ['nome' => 'Helena', 'notas' => [8.0, 6.0, 7.0, 9.0]],
    ['nome' => 'Sabrina', 'notas' => [4.0, 6.5, 7.0, 3.5]],
    ['nome' => 'Tereza', 'notas' => [8.5, 8.0, 7.5, 10.0]],
    ['nome' => 'Bruno', 'notas' => [9.0, 8.0, 6.5, 8.0]],
    ['nome' => 'Roberta', 'notas' => [3.0, 7.0, 5.5, 6.5]],
];
$alunoscommedia = [];/*o array $alunoscommedia é inicializado como vazio para armazenar os dados processados*/
foreach ($turma8A as $aluno) {
  
    $media = array_sum($aluno['notas']) / count($aluno['notas']); /*array_sum() soma todas as notas do aluno,
count() conta o total de notas*/        
    $aluno['media'] = number_format($media, 1, '.', '');/*number_format() deixa com uma casa decimal*/     
    $alunosComMedia[] = $aluno; /*$alunosComMedia junta o aluno com a média*/
}
/*usort() ordena o array $alunosComMedia de forma personalizada, function($a, $b) compara as médias de dois alunos, <=> é usado para ordenar de forma decrescente (do maior para o menor), comparando `$b` com `$a`*/
usort($alunosComMedia, function($a, $b) {
    return $b['media'] <=> $a['media'];
});
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>8º Ano A - Notas</title>
    <link rel="stylesheet" href="style.css">     
</head>
<body>
    <div class="container">
        <h1>8ºANO A</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>1º Bim</th>
                    <th>2º Bim</th>
                    <th>3º Bim</th>
                    <th>4º Bim</th>
                    <th>Média</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $soma_geral = 0;               
                $total_alunos = count($alunosComMedia);/*conta o número total de alunos*/
                foreach ($alunosComMedia as $aluno) {
                    echo '<tr>';             
                    echo '<td>' . htmlspecialchars($aluno['nome']) . '</td>';  
                    foreach ($aluno['notas'] as $nota) {/*percorre as notas de cada aluno*/                        
                        echo '<td>' . number_format($nota, 1, '.', '') . '</td>';
                    }                    
                    /*formatando com o css, se a média for >=6, a classe é media-aprovado(para verde), caso contrário, a classe é media-reprovado (para vermelho)*/
                    $classe_media = ($aluno['media'] >= 6.0) ? 'media-aprovado' : 'media-reprovado';                    
                    echo '<td class="' . $classe_media . '">' . $aluno['media'] . '</td>';             
                    echo '</tr>';
                    /*soma a média do aluno à variável $soma_geral para o cálculo da média da turma*/
                    $soma_geral += $aluno['media'];
                }                
                /*se o total de alunos é >0 para evitar divisão por zero*/
                if ($total_alunos > 0) {
                    /*calcula a média geral da turma*/
                    $media_geral = $soma_geral / $total_alunos;                    
                    echo '<tr class="media-geral">';                   
                    echo '<td colspan="5">Média Geral da Turma</td>';
                    /*mostra a média geral da turma, formatada com uma casa decimal*/
                    echo '<td>' . number_format($media_geral, 1, '.', '') . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>