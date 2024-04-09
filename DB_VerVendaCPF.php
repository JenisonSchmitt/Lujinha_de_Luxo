<?php
$servername = "**********";
$username = "**********";
$password = "**********";
$dbname = "**********";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];

    $sql = "SELECT `produto`.`codigo`, `produto`.`nome` AS `nome_produto`, `produto`.`valor`, `cliente`.`nome` AS `nome_cliente`, `cliente`.`CPF`, `venda`.`dia` AS venda_dia
            FROM `produto` 
            JOIN `venda` ON `venda`.`produto_nome` = `produto`.`nome` 
            JOIN `cliente` ON `venda`.`cliente_nome` = `cliente`.`nome` 
            WHERE `cliente`.`CPF` = '$cpf'";

    $result = $conn->query($sql);

    echo "<table class='product-table'>";
    echo "<thead><tr><th>Código</th><th>Nome Produto</th><th>Valor</th><th>Nome Cliente</th><th>CPF Cliente</th><th>Dia da Venda</th></tr></thead>";
    echo "<tbody>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["codigo"] . "</td>";
            echo "<td>" . $row["nome_produto"] . "</td>";
            echo "<td>" . $row["valor"] . "</td>";
            echo "<td>" . $row["nome_cliente"] . "</td>";
            echo "<td>" . $row["CPF"] . "</td>";
            echo "<td>" . $row["venda_dia"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhuma venda disponível para este CPF</td></tr>";
    }

    echo "</tbody></table>";
}

$conn->close();
?>
