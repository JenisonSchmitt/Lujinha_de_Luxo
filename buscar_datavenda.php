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

// Recupera o nome do cliente enviado por AJAX
$clienteNome = $_GET['cliente_nome'];

// Prepara a consulta SQL para buscar todas as datas de compra do cliente
$sql = "SELECT `dia` FROM `venda` WHERE `cliente_nome` = ?";
$stmt = $conn->prepare($sql);

// Vincula o parâmetro
$stmt->bind_param("s", $clienteNome);

// Executa a consulta
$stmt->execute();

// Vincula as variáveis de resultado
$stmt->bind_result($data);

// Inicializa o array de datas
$datas = array();

// Coleta os resultados
while ($stmt->fetch()) {
    $datas[] = $data;
}

// Retorna as datas como um JSON
echo json_encode($datas);

// Fecha a conexão
$stmt->close();
$conn->close();
?>
