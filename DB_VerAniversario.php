<?php
$servername = "localhost";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";
$dbname = "u228502032_Lujinha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM cliente WHERE DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(nascimento), '-', DAY(nascimento))) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY);";
$result = $conn->query($sql);

echo "<table class='product-table'>";
echo "<thead><tr><th>CPF</th><th>Nome</th><th>Telefone</th><th>E-mail</th><th>Data de Nascimento</th></tr></thead>";
echo "<tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["CPF"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["nascimento"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhum Cliente disponível</td></tr>";
}

echo "</tbody></table>";

$conn->close();
?>
