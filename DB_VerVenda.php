<?php
$servername = "localhost";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";
$dbname = "u228502032_Lujinha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT `produto`.`codigo` AS codigo_produto, `produto`.`nome` AS nome_produto, `produto`.`valor` AS valor_produto, `cliente`.`nome` AS nome_cliente, `cliente`.`CPF` AS CPF_cliente, `venda`.`dia` AS venda_dia
        FROM `produto` 
        JOIN `venda` ON `venda`.`produto_nome` = `produto`.`nome` 
        JOIN `cliente` ON `venda`.`cliente_nome` = `cliente`.`nome` ORDER BY `venda`.`dia` DESC";

$result = $conn->query($sql);

echo "<table class='product-table'>";
echo "<thead><tr><th>Código</th><th>Nome Produto</th><th>Valor</th><th>Nome Cliente</th><th>CPF Cliente</th><th>Dia da Venda</th></tr></thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["codigo_produto"] . "</td>";
        echo "<td>" . $row["nome_produto"] . "</td>";
        echo "<td>" . $row["valor_produto"] . "</td>";
        echo "<td>" . $row["nome_cliente"] . "</td>";
        echo "<td>" . $row["CPF_cliente"] . "</td>";
        echo "<td>" . $row["venda_dia"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhuma venda disponível</td></tr>";
}

echo "</tbody></table>";

$conn->close();
?>
