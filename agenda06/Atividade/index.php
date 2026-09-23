<?php
// Configurações de conexão com o banco de dados MySQL
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "pwii";

// Criando a conexão utilizando o mysqli
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificando se houve erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Capturando o termo de busca digitado pelo usuário
$busca = isset($_GET['busca']) ? $conexao->real_escape_string($_GET['busca']) : '';

// Montando a consulta SQL com filtro de busca e ordenação por média (Ranking)
// O cálculo da média é feito somando as 4 notas e dividindo por 4 diretamente no SQL
if ($busca != '') {
    $sql = "SELECT nome, nota1, nota2, nota3, nota4, 
            ((nota1 + nota2 + nota3 + nota4) / 4) AS media 
            FROM alunoconcluinte 
            WHERE nome LIKE '%$busca%' 
            ORDER BY media DESC";
} else {
    // Caso não haja busca, exibe todos ordenados pela maior média (Ranking)
    $sql = "SELECT nome, nota1, nota2, nota3, nota4, 
            ((nota1 + nota2 + nota3 + nota4) / 4) AS media 
            FROM alunoconcluinte 
            ORDER BY media DESC";
}

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ranking e Notas dos Alunos Concluintes</title>
    <!-- Importando o arquivo de estilo CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Ranking e Desempenho de Alunos</h1>

        <!-- Formulário de Pesquisa por Nome -->
        <form method="GET" action="" class="form-busca">
            <input type="text" name="busca" placeholder="Pesquisar por nome do aluno..." value="<?php echo htmlspecialchars($busca); ?>">
            <button type="submit">Buscar</button>
            <?php if ($busca != ''): ?>
                <a href="index.php" class="btn-limpar">Limpar</a>
            <?php endif; ?>
        </form>

        <!-- Tabela HTML estilizada -->
        <table>
            <thead>
                <tr>
                    <th>Posição (Ranking)</th>
                    <th>Nome</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                    <th>Média Final</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($resultado->num_rows > 0) {
                    $posicao = 1;
                    // Laço de repetição para exibir cada aluno na tabela
                    while($row = $resultado->fetch_assoc()) {
                        $media = $row['media'];
                        // Definindo a situação do aluno com base na média (ex: média >= 6 aprovado)
                        $situacao = ($media >= 6) ? "Aprovado" : "Reprovado";
                        $classe_situacao = ($media >= 6) ? "aprovado" : "reprovado";

                        echo "<tr>";
                        echo "<td><strong>#{$posicao}</strong></td>";
                        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                        echo "<td>" . $row['nota1'] . "</td>";
                        echo "<td>" . $row['nota2'] . "</td>";
                        echo "<td>" . $row['nota3'] . "</td>";
                        echo "<td>" . $row['nota4'] . "</td>";
                        echo "<td><strong>" . number_format($media, 2, ',', '.') . "</strong></td>";
                        echo "<td class='{$classe_situacao}'>{$situacao}</td>";
                        echo "</tr>";
                        $posicao++;
                    }
                } else {
                    echo "<tr><td colspan='8' class='sem-registro'>Nenhum aluno encontrado.</td></tr>";
                }
                $conexao->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>