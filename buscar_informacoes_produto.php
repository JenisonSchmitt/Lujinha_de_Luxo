<?php
$servername = "localhost";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";
$dbname = "u228502032_Lujinha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nomeProduto = $_GET['nome'];

// Execute uma consulta SQL para buscar informações do produto pelo nome
$sql = "SELECT codigo, nomehtml, descricao, valor, marca, quantidade FROM produtos_site WHERE nome = '$nomeProduto'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $produto = $result->fetch_assoc();
    // Adicione um log para verificar se os dados estão sendo recuperados
    error_log("Informações do Produto: " . print_r($produto, true));
    
    // Retorna as informações do produto como JSON
    echo json_encode($produto);
} else {
    // Retorna um array vazio se o produto não for encontrado
    echo json_encode(array());
}

$conn->close();
?>
