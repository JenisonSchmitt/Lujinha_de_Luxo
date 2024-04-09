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

// Recupera o termo de pesquisa enviado por AJAX
$termoPesquisa = $_GET['term'];

// Prepara a consulta SQL
$sql = "SELECT `nome` FROM `cliente` WHERE `nome` LIKE '%$termoPesquisa%'";

// Executa a consulta
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Inicializa o array de opções
    $options = array();

    // Adiciona as opções com base nos produtos do banco de dados
    while ($row = $result->fetch_assoc()) {
        $options[] = $row["nome"];
    }

    // Retorna as opções como um JSON
    echo json_encode($options);
} else {
    // Retorna um array vazio se nenhum produto for encontrado
    echo json_encode(array());
}

// Fecha a conexão
$conn->close();
?>
