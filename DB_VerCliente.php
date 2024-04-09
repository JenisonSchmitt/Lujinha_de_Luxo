<?php
$servername = "**********";
$username = "**********";
$password = "**********";
$dbname = "**********";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT `CPF`, `nome`, `telefone`, `email`, `nascimento` FROM cliente";
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
