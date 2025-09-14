<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <?php
    $servername = "localhost";//tipo de conexão
    $username = "root"; //nome
    $password = "usbw"; //senha
    $nomedobanco = "pwii"; //nome do banco
    //criando conexao com as informações a cima
    $conex = new mysqli($servername, $username, $password, $nomedobanco);
    //se a conexao falhar, exibe a mensagem de erro
    if ($conex->connect_error) { //verifica se houve erro na conexão
        die("Conexão falhou: " . $conex->connect_error); //mensagem de erro
    }
    //se houver uma busca pelo nome
    $search_query = "";//inicializa a variável de busca vazia
    if (isset($_GET['search']) && !empty($_GET['search'])) { //verifica se a busca existe e não está vazio
        $search_term = $conex->real_escape_string($_GET['search']); //define o termo de busca, escapando caracteres especiais para evitar SQL Injection
        $search_query = "WHERE nome LIKE '%$search_term%'"; //adiciona a cláusula WHERE para filtrar os resultados
    }
    //consulta SQL para selecionar todos os alunos, aplicando o filtro de busca se houver
    $sql = "SELECT idalunoconcluinte, nome, nota1, nota2, nota3, nota4 FROM alunoconcluinte " . $search_query; 
    //executa a consulta e armazena o resultado
    $result = $conex->query($sql);
    ?>
    <div class="container">
        <h1>Alunos Concluintes</h1>
        <div class="controls">
            <form action="" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Buscar por nome..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Buscar</button>
            </form>            
            <?php 
            //somente exibe o botão de ranking se não houver uma busca por nome
            if (!isset($_GET['search']) || empty($_GET['search'])) {
                echo '<div class="ranking-link">';
                echo '<a href="?sort=ranking">Exibir Ranking</a>';
                echo '</div>';
            }
            ?>            
            <?php 
            //se estiver em modo de ranking ou busca, exibe o link para voltar à tabela completa
            if (isset($_GET['sort']) || isset($_GET['search'])) {
                echo '<div class="back-link">';
                echo '<a href="index.php">Voltar para a Tabela Completa</a>';
                echo '</div>';
            }
            ?>
        </div>     
        <?php
        if ($result->num_rows > 0) { //verifica se há resultados na consulta    
            //cria um array para armazenar os dados e calcular a média
            $students = []; //array vazio para armazenar os dados dos alunos
            while($row = $result->fetch_assoc()) { //percorre cada linha do resultado
                $row['media'] = ($row['nota1'] + $row['nota2'] + $row['nota3'] + $row['nota4']) / 4; //calcula a média das notas
                $students[] = $row; //adiciona a linha ao array de alunos
            }
            //se o ranking for solicitado, ordena o array pelo campo 'media' em ordem decrescente
            if (isset($_GET['sort']) && $_GET['sort'] == 'ranking') { //verifica se ranking foi solicitado
                usort($students, function($a, $b) { //função de comparação para ordenar
                    return $b['media'] <=> $a['media']; //ordena em ordem decrescente pela média
                });
            }
            //inicia a tabela HTML
            echo "<table>"; //inicia a tabela
            echo "<thead>"; //inicia o cabeçalho da tabela
            echo "<tr>"; //inicia uma linha
            echo "<th>Código</th>"; //cabeçalho da coluna código
            echo "<th>Nome</th>"; //cabeçalho da coluna nome
            echo "<th>Nota 1</th>"; //cabeçalho da coluna nota 1
            echo "<th>Nota 2</th>"; //cabeçalho da coluna nota 2
            echo "<th>Nota 3</th>"; //cabeçalho da coluna nota 3
            echo "<th>Nota 4</th>"; //cabeçalho da coluna nota 4
            echo "<th>Média</th>"; // Adiciona a coluna de média
            echo "</tr>"; //fecha a linha
            echo "</thead>"; //fecha o cabeçalho da tabela
            echo "<tbody>"; //inicia o corpo da tabela

            //percorre o array de alunos e exibe cada um em uma linha da tabela
            foreach ($students as $student) { //para cada aluno no array
                echo "<tr>"; //inicia uma nova linha
                echo "<td>" . $student['idalunoconcluinte'] . "</td>"; //exibe o código do aluno
                echo "<td>" . $student['nome'] . "</td>"; //exibe o nome do aluno
                echo "<td>" . $student['nota1'] . "</td>"; //exibe a nota 1
                echo "<td>" . $student['nota2'] . "</td>"; //exibe a nota 2
                echo "<td>" . $student['nota3'] . "</td>"; //exibe a nota 3
                echo "<td>" . $student['nota4'] . "</td>"; //exibe a nota 4
                echo "<td>" . number_format($student['media'], 2) . "</td>"; //exibe a média formatada com 2 casas decimais
                echo "</tr>"; //fecha a linha
            }
            echo "</tbody>"; //fecha o corpo da tabela
            echo "</table>"; //fecha a tabela
        } else { //se não houver resultados
            echo "<p>Nenhum resultado encontrado.</p>"; //exibe a mensagem de nenhum resultado
        }
        $conex->close(); //fecha a conexão com o banco de dados
        ?>
    </div>
</body>
</html>