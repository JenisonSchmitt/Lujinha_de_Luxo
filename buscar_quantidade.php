<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";
$dbname = "u228502032_Lujinha";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$produto = $_GET['produto'];

// Prepara a consulta SQL
$sql = "SELECT `quantidade` FROM `produto` WHERE `nome` = '$produto'";

// Executa a consulta
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Retorna a quantidade como um JSON
    $row = $result->fetch_assoc();
    echo json_encode(array('quantidade' => $row["quantidade"]));
} else {
    // Retorna um array vazio se nenhum produto for encontrado
    echo json_encode(array('quantidade' => ''));
}

// Fecha a conexão
$conn->close();
?>