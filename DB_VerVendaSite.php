<?php
$servername = "localhost";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";
$dbname = "u228502032_Lujinha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT `nome_produto`, `quantidade`, `nome_cliente`, `data_compra`, `hora_compra` 
        FROM venda_site 
        ORDER BY `data_compra` ASC";
$result = $conn->query($sql);

echo "<table class='product-table'>";
echo "<thead><tr><th>Nome do Produto</th><th>Quantidade</th><th>Nome do Cliente</th><th>Data da Compra</th><th>Hora da Compra</th></tr></thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nome_produto"] . "</td>";
        echo "<td>" . $row["quantidade"] . "</td>";
        echo "<td>" . $row["nome_cliente"] . "</td>";
        echo "<td>" . $row["data_compra"] . "</td>";
        echo "<td>" . $row["hora_compra"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhum registro de venda disponível</td></tr>";
}

echo "</tbody></table>";

$conn->close();
?>
