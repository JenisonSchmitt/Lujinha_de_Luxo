<?php

// Sessão PHP para verificar se o cliente está logado
session_start();


// Configurações de conexão com o banco de dados
$servername = "localhost";
$database = "u228502032_Lujinha";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o cliente está logado
if (!isset($_SESSION['email'])) {
    // Se o cliente não estiver logado, retorna uma mensagem de erro
    echo json_encode(array('error' => 'Cliente nao esta logado.'));
    exit();
}

// Recupera o email do cliente da sessão
$email_cliente = $_SESSION['email'];

// Consulta SQL para obter as informações do cliente utilizando prepared statement
$stmt = $conn->prepare("SELECT nome, telefone, email, nascimento, endereco FROM cliente WHERE email = ?");
$stmt->bind_param("s", $email_cliente);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    if ($result->num_rows > 0) {
        // Se houver pelo menos uma linha de resultado, converte os dados em formato JSON e imprime
        $row = $result->fetch_assoc();
        $cliente_info = array(
            'nome' => $row['nome'],
            'telefone' => $row['telefone'],
            'email' => $row['email'],
            'nascimento' => $row['nascimento'],
            'endereco' => $row['endereco']
        );
        echo json_encode($cliente_info);
    } else {
        // Se não houver resultados, imprime uma mensagem de erro em JSON
        echo json_encode(array('error' => 'Nenhuma informação encontrada para este cliente.'));
    }
} else {
    // Se ocorrer um erro na consulta, imprime uma mensagem de erro em JSON
    echo json_encode(array('error' => 'Erro na consulta: ' . $conn->error));
}

// Fecha o statement e a conexão com o banco de dados
$stmt->close();
$conn->close();
?>
