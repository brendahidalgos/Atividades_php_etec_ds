<?php
$servername = "localhost";//tipo de conexão
$username = "root"; //nome de usuario
$password = "usbw"; //senha
$dbname = "pwii"; //nome do banco

//criando a conexao
$conex = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conex->connect_error) {
    die("Conexão falhou: " . $conex->connect_error);
}

// Inicia a parte de busca, se houver um termo de pesquisa
$search_query = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = $conn->real_escape_string($_GET['search']);
    $search_query = "WHERE nome LIKE '%$search_term%'";
}

// Inicia a parte de ordenação
$order_by_query = "";
if (isset($_GET['sort']) && $_GET['sort'] == 'ranking') {
    // A ordenação por ranking será feita no lado do PHP após o cálculo da média
    // A consulta inicial é simples
    $sql = "SELECT idalunoconcluinte, nome, nota1, nota2, nota3, nota4 FROM alunoconcluinte " . $search_query;
} else {
    // Consulta padrão sem ordenação específica, apenas por ID
    $sql = "SELECT idalunoconcluinte, nome, nota1, nota2, nota3, nota4 FROM alunoconcluinte " . $search_query . " ORDER BY idalunoconcluinte ASC";
}

// Executa a consulta
$result = $conex->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Concluintes - MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Alunos Concluintes</h1>

        <div class="controls">
            <form action="" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Buscar por nome..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Buscar</button>
            </form>
            <div class="ranking-link">
                <a href="?sort=ranking<?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>">Exibir Ranking</a>
            </div>
        </div>
        
        <?php
        if ($result->num_rows > 0) {
            // Cria um array para armazenar os dados e calcular a média
            $students = [];
            while($row = $result->fetch_assoc()) {
                $row['media'] = ($row['nota1'] + $row['nota2'] + $row['nota3'] + $row['nota4']) / 4;
                $students[] = $row;
            }

            // Se o modo ranking estiver ativado, ordena os alunos pela média em ordem decrescente
            if (isset($_GET['sort']) && $_GET['sort'] == 'ranking') {
                usort($students, function($a, $b) {
                    return $b['media'] <=> $a['media'];
                });
            }

            // Inicia a tabela HTML
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Código</th>";
            echo "<th>Nome</th>";
            echo "<th>Nota 1</th>";
            echo "<th>Nota 2</th>";
            echo "<th>Nota 3</th>";
            echo "<th>Nota 4</th>";
            echo "<th>Média</th>"; // Adiciona a coluna de média
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Exibe os dados de cada aluno
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>" . $student['idalunoconcluinte'] . "</td>";
                echo "<td>" . $student['nome'] . "</td>";
                echo "<td>" . $student['nota1'] . "</td>";
                echo "<td>" . $student['nota2'] . "</td>";
                echo "<td>" . $student['nota3'] . "</td>";
                echo "<td>" . $student['nota4'] . "</td>";
                echo "<td>" . number_format($student['media'], 2) . "</td>"; // Exibe a média formatada
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nenhum resultado encontrado.</p>";
        }
        $conex->close();
        ?>
    </div>
</body>
</html>