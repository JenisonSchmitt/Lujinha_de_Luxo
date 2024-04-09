<?php
$servername = "**********";
$username = "**********";
$password = "**********";
$dbname = "**********";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$termoPesquisa = $_GET['nome'];

$sql = "SELECT nome FROM `produtos_site` WHERE `nome` LIKE '%$termoPesquisa%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $options = array();

    while ($row = $result->fetch_assoc()) {
        $options[] = $row["nome"];
    }

    echo json_encode($options);
} else {
    echo json_encode(array());
}

$conn->close();
?>
