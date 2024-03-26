<?php
$servername = "localhost";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";
$dbname = "u228502032_Lujinha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT p.id AS codigo_produto, p.nome AS nome_produto, p.valor AS valor_produto, p.quantidade AS quantidade_existente,
  COALESCE(SUM(v.quantidade_vendida), 0) AS quantidade_vendida, (p.quantidade - COALESCE(SUM(v.quantidade_vendida), 0)) AS quantidade_restante
FROM produto p LEFT JOIN venda v ON p.nome = v.produto_nome GROUP BY p.codigo, p.nome, p.valor, p.quantidade ORDER BY quantidade_restante ASC";
$result = $conn->query($sql);

echo "<table class='product-table'>";
echo "<thead><tr><th>Código</th><th>Nome</th><th>Existente</th><th>Vendida</th><th>Quantidade Restante</th><th>Valor</th></tr></thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["codigo_produto"] . "</td>";
        echo "<td>" . $row["nome_produto"] . "</td>";
        echo "<td>" . $row["quantidade_existente"] . "</td>";
        echo "<td>" . $row["quantidade_vendida"] . "</td>";
        echo "<td>" . $row["quantidade_restante"] . "</td>";
        echo "<td>" . $row["valor_produto"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhum produto disponível</td></tr>";
}

echo "</tbody></table>";

$conn->close();
?>
