<?php
    // A estrutura foreach percorre cada elemento de um array.
    // O primeiro loop foreach percorre cada aluno no array '$turma8A'.
    // O segundo loop foreach, aninhado, percorre as notas de cada aluno.
    // Isso permite calcular a média de cada estudante individualmente.
    $turma8A = [
        ['nome' => 'Maria', 'notas' => [7.5, 8.0, 6.5, 9.0]],
        ['nome' => 'João', 'notas' => [5.0, 4.5, 6.0, 5.5]],
        ['nome' => 'Ana', 'notas' => [9.5, 9.0, 8.5, 10.0]],
        ['nome' => 'Carlos', 'notas' => [6.0, 7.0, 5.5, 6.5]],
        ['nome' => 'Fernanda', 'notas' => [4.0, 5.0, 3.5, 4.5]],    ];

    // Calcula a média de cada aluno e armazena no array.
    // Isso é necessário para ordenar a tabela pela média depois.
    foreach ($turma8A as &$aluno) {
        $media = array_sum($aluno['notas']) / count($aluno['notas']);
        $aluno['media'] = number_format($media, 1, '.', '');
    }
    // Desafio: Ordena a tabela pela média, do maior para o menor.
    usort($turma8A, function($a, $b) {
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
                $soma_geral = 0;
                $total_alunos = count($turma8A);

                foreach ($turma8A as $aluno) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($aluno['nome']) . '</td>';
                    
                    // Exibe as notas dos 4 bimestres.
                    foreach ($aluno['notas'] as $nota) {
                        echo '<td>' . number_format($nota, 1, '.', '') . '</td>';
                    }
                    
                    // Exibe a média do aluno com cor.
                    $classe_media = ($aluno['media'] >= 6.0) ? 'media-aprovado' : 'media-reprovado';
                    echo '<td class="' . $classe_media . '">' . $aluno['media'] . '</td>';
                    echo '</tr>';

                    // Soma as médias para o cálculo da média geral.
                    $soma_geral += $aluno['media'];
                }
                
                // Desafio: Exibe a média geral da turma.
                if ($total_alunos > 0) {
                    $media_geral = $soma_geral / $total_alunos;
                    echo '<tr class="media-geral">';
                    echo '<td colspan="5">Média Geral da Turma</td>';
                    echo '<td>' . number_format($media_geral, 1, '.', '') . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>