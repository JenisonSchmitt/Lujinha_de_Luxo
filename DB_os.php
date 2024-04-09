<?php
// Configurações do banco de dados
$servername = "**********";
$username = "**********";
$password = "**********";
$dbname = "**********";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recupera os dados do formulário
$nomeCliente = $_POST['nome_cli'];
$dataCompra = $_POST['data'];

// Prepara a consulta SQL
$sql = "SELECT v.id, v.cliente_nome, v.produto_nome, v.quantidade_vendida, v.dia, p.valor FROM venda v join produto p on v.produto_nome = p.nome WHERE cliente_nome = '$nomeCliente' AND dia = '$dataCompra'";

// Executa a consulta
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

// Inicializa um array para armazenar os resultados
$resultados = array();

// Adiciona os resultados ao array
while ($row = $result->fetch_assoc()) {
    $resultados[] = $row;
}

// Retorna os resultados como um JSON
echo json_encode($resultados);

// Fecha a conexão
$conn->close();
?>
