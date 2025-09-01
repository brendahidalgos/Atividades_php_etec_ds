<?php
//array bidimensional inicial que contém os dados dos alunos
$turma8A = [
    ['nome' => 'Maria', 'notas' => [7.5, 8.0, 6.5, 9.0]],
    ['nome' => 'João', 'notas' => [5.0, 4.5, 6.0, 5.5]],
    ['nome' => 'Ana', 'notas' => [9.5, 9.0, 8.5, 10.0]],
    ['nome' => 'Carlos', 'notas' => [6.0, 7.0, 5.5, 6.5]],
    ['nome' => 'Fernanda', 'notas' => [4.0, 5.0, 3.5, 4.5]],
];
$alunoscommedia = [];//o array $alunoscommedia é inicializado como vazio para armazenar os dados processados
foreach ($turma8A as $aluno) {
  
    $media = array_sum($aluno['notas']) / count($aluno['notas']); /*array_sum() soma todas as notas do aluno,
count() conta o total de notas*/    
    /*number_format() deixa com uma casa decimal */
    $aluno['media'] = number_format($media, 1, '.', '');
    
    // O array do aluno, agora com a média, é adicionado ao novo array `$alunosComMedia`.
    // Esta abordagem evita o uso de referências (`&`), prevenindo a duplicação de dados.
    $alunosComMedia[] = $aluno;
}

// 2. Ordena o novo array com base na média.
// A função `usort()` ordena o array `$alunosComMedia` de forma personalizada.
// A função de comparação (`function($a, $b)`) compara as médias de dois alunos.
// O operador de comparação de nave espacial (`<=>`) é usado para ordenar
// de forma decrescente (do maior para o menor), comparando `$b` com `$a`.
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
        <h1>8º ANO A</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>1º Bimestre</th>
                    <th>2º Bimestre</th>
                    <th>3º Bimestre</th>
                    <th>4º Bimestre</th>
                    <th>Média</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // INÍCIO DO CÓDIGO PHP PARA EXIBIÇÃO DA TABELA

                // Inicializa a variável para somar todas as médias dos alunos.
                $soma_geral = 0;
                // Conta o número total de alunos no array já processado.
                $total_alunos = count($alunosComMedia);

                // Este loop `foreach` percorre o array `$alunosComMedia`, que já está ordenado.
                foreach ($alunosComMedia as $aluno) {
                    // Inicia uma nova linha `<tr>` da tabela para cada aluno.
                    echo '<tr>';
                    
                    // Exibe o nome do aluno em uma célula `<td>`.
                    // A função `htmlspecialchars()` é usada para evitar ataques de injeção de código (XSS).
                    echo '<td>' . htmlspecialchars($aluno['nome']) . '</td>';
                    
                    // Este loop aninhado percorre as notas de cada aluno.
                    foreach ($aluno['notas'] as $nota) {
                        // Exibe cada nota em uma célula `<td>`, formatada para ter uma casa decimal.
                        echo '<td>' . number_format($nota, 1, '.', '') . '</td>';
                    }
                    
                    // Define a classe CSS para a célula da média com base no valor.
                    // Se a média for maior ou igual a 6.0, a classe é 'media-aprovado' (para verde).
                    // Caso contrário, a classe é 'media-reprovado' (para vermelho).
                    $classe_media = ($aluno['media'] >= 6.0) ? 'media-aprovado' : 'media-reprovado';
                    
                    // Exibe a média do aluno em uma célula `<td>` com a cor correta.
                    echo '<td class="' . $classe_media . '">' . $aluno['media'] . '</td>';
                    
                    // Fecha a linha `<tr>` da tabela.
                    echo '</tr>';

                    // Soma a média do aluno à variável `$soma_geral` para o cálculo da média da turma.
                    $soma_geral += $aluno['media'];
                }
                
                // Exibe a média geral da turma (desafio opcional).
                // A condição `if` verifica se o total de alunos é maior que zero para evitar divisão por zero.
                if ($total_alunos > 0) {
                    // Calcula a média geral da turma.
                    $media_geral = $soma_geral / $total_alunos;
                    
                    // Cria uma nova linha na tabela para exibir o resultado.
                    echo '<tr class="media-geral">';
                    // A célula é expandida para ocupar 5 colunas usando `colspan="5"`.
                    echo '<td colspan="5">Média Geral da Turma</td>';
                    // Exibe a média geral da turma, formatada com uma casa decimal.
                    echo '<td>' . number_format($media_geral, 1, '.', '') . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>