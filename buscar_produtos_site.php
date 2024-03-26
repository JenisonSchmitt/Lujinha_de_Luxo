<?php
$servername = "localhost";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";
$dbname = "u228502032_Lujinha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara a consulta SQL para buscar todos os hidratantes
$sql = "SELECT ps.nomehtml, ps.nome, ps.descricao, ps.valor, ps.marca, ps.quantidade,
    COALESCE((p.quantidade - COALESCE(SUM(v.quantidade_vendida), 0)), 0) AS quantidade_restante
    FROM produtos_site ps
    LEFT JOIN produto p ON ps.codigo = p.codigo
    LEFT JOIN venda v ON p.nome = v.produto_nome
    GROUP BY ps.id, ps.nomehtml, ps.nome, ps.descricao, ps.valor, ps.marca, ps.quantidade;";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicializa o array de produtos
    $produtos = array();

    // Adiciona os produtos ao array
    while ($row = $result->fetch_assoc()) {
        $produtos[] = array(
            'nomehtml' => $row["nomehtml"],
            'nome' => $row["nome"],
            'descricao' => $row["descricao"],
            'valor' => $row["valor"],
            'quantidade_restante' => $row["quantidade_restante"],
            'marca' => $row["marca"],
            'quantidade' => $row["quantidade"]
        );
    }    

    // Retorna o array de produtos como JSON
    echo json_encode($produtos);
} else {
    // Retorna um array vazio se nenhum produto for encontrado
    echo json_encode(array());
}

$conn->close();
?>
