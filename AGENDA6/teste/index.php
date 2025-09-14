<?php
// -------------------- CONFIGURAÇÃO DO BANCO --------------------
$DB_HOST = 'localhost';     // geralmente 'localhost'
$DB_USER = 'root';          // seu usuário MySQL
$DB_PASS = 'usbw';              // sua senha MySQL (XAMPP costuma ter '')
$DB_NAME = 'pwii';

// -------------------- CONEXÃO (mysqli) -------------------------
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
    http_response_code(500);
    echo "<h1>Erro ao conectar ao banco de dados</h1>";
    echo "<p>Erro: " . htmlspecialchars($mysqli->connect_error) . "</p>";
    exit;
}
$mysqli->set_charset('utf8mb4');

// -------------------- TRATAMENTO DA PESQUISA --------------------
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$q_like = '%' . $q . '%';
$ranking = isset($_GET['ranking']) && $_GET['ranking'] == '1';

// -------------------- CONSULTA PRINCIPAL ------------------------
if ($ranking) {
    $sql = "SELECT idalunoconcluinte, nome, nota1, nota2, nota3, nota4,
                   (nota1 + nota2 + nota3 + nota4) / 4 AS media
            FROM alunoconcluinte
            WHERE nome LIKE ?
            ORDER BY media DESC, nome ASC";
} else {
    $sql = "SELECT idalunoconcluinte, nome, nota1, nota2, nota3, nota4,
                   (nota1 + nota2 + nota3 + nota4) / 4 AS media
            FROM alunoconcluinte
            WHERE nome LIKE ?
            ORDER BY idalunoconcluinte ASC";
}

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $q_like);
$stmt->execute();
$res = $stmt->get_result();
$rows = [];
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $rows[] = $row;
    }
}
$stmt->close();
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Alunos Concluintes — Notas</title>
    <style>
        :root{ --bg:#11a2d8; --card:#f6fbfc; --accent:#10b3c9; }
        *{box-sizing:border-box}
        body{ margin:0; font-family:Arial, Helvetica, sans-serif; background:var(--bg); color:#223; }
        .wrap{min-height:100vh; display:flex; align-items:center; justify-content:center; padding:40px 20px}
        .card{ width:960px; max-width:100%; background:white; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.12); overflow:hidden; }
        header{background:var(--accent); padding:22px 24px; text-align:center; color:white}
        header h1{margin:0; font-size:26px;}
        .controls{display:flex; gap:12px; padding:18px 24px; align-items:center; justify-content:space-between; flex-wrap:wrap;}
        .search{display:flex; gap:8px; align-items:center}
        .search input[type="text"]{padding:10px 12px; border:1px solid #ddd; border-radius:6px; width:200px}
        .search button{padding:10px 14px; border-radius:6px; border:0; background:var(--accent); color:white; cursor:pointer}
        .search button:hover{opacity:0.95}
        .actions{display:flex; gap:10px;}
        .btn{padding:10px 16px; border-radius:6px; border:none; background:#06a0b8; color:white; cursor:pointer; text-decoration:none; font-size:14px;}
        .btn:hover{opacity:0.9}
        .table-wrap{padding:0 24px 24px}
        table{width:100%; border-collapse:collapse; margin-top:6px}
        th, td{padding:10px 12px; text-align:center}
        th{background:#06a0b8; color:white; font-weight:600;}
        tr:nth-child(even) td{background:#f3f6f6}
        .small{font-size:13px; color:#555}
        .footer{background:#f7f9f9; padding:12px 24px; display:flex; justify-content:space-between; align-items:center}
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <header>
            <h1>Alunos Concluintes</h1>
            <div class="small"><?php echo $ranking ? 'Ranking por média (maior para menor)' : 'Listagem padrão'; ?></div>
        </header>

        <div class="controls">
            <form class="search" method="get" action="">
                <label for="q" class="small">Pesquisar por nome:</label>
                <input id="q" name="q" type="text" placeholder="Digite o nome..." value="<?php echo htmlspecialchars($q); ?>">
                <button type="submit">Pesquisar</button>
                <a href="<?php echo strtok($_SERVER['REQUEST_URI'], '?'); ?>" style="margin-left:8px; font-size:13px; color:#0b6; text-decoration:none">Limpar</a>
            </form>
            <div class="actions">
                <a href="?ranking=1" class="btn">Ranking</a>
                <button type="button" class="btn" onclick="history.back()">Voltar</button>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Nota 3</th>
                        <th>Nota 4</th>
                        <th>Média</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($rows) === 0): ?>
                        <tr><td colspan="7" class="small">Nenhum aluno encontrado.</td></tr>
                    <?php else: ?>
                        <?php foreach ($rows as $r): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($r['idalunoconcluinte']); ?></td>
                                <td style="text-align:left; padding-left:16px"><?php echo htmlspecialchars($r['nome']); ?></td>
                                <td><?php echo number_format((float)$r['nota1'], 1, ',', ''); ?></td>
                                <td><?php echo number_format((float)$r['nota2'], 1, ',', ''); ?></td>
                                <td><?php echo number_format((float)$r['nota3'], 1, ',', ''); ?></td>
                                <td><?php echo number_format((float)$r['nota4'], 1, ',', ''); ?></td>
                                <td><strong><?php echo number_format((float)$r['media'], 2, ',', ''); ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <div class="small">Exibindo <?php echo count($rows); ?> aluno(s).</div>
            <div class="small">Feito por Gabriela — Profª Inês</div>
        </div>
    </div>
</div>
</body>
</html>
<?php $mysqli->close(); ?>
