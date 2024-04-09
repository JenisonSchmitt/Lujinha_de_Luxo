<?php

// Verifica se os dados do carrinho foram enviados via POST
if (isset($_POST['cart'])) {
    // Recupera os dados do carrinho
    $cartItems = $_POST['cart'];
    
    // Verifica se o e-mail está definido na sessão (supondo que você tenha implementado a lógica de login e armazenado o e-mail na sessão)
    session_start();
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Conexão com o banco de dados
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

        $conn->query("SET time_zone = '-03:00'");

        
        // Query para buscar o nome e CPF do cliente com base no e-mail
        $sql_cliente = "SELECT nome, cpf, email FROM cliente WHERE email = '$email'";
        $result_cliente = $conn->query($sql_cliente);
        
        // Verifica se há resultados da consulta
        if ($result_cliente->num_rows > 0) {
            $row_cliente = $result_cliente->fetch_assoc();
            $nome_cliente = $row_cliente['nome'];
            $cpf_cliente = $row_cliente['cpf'];
            $email_cliente = $row_cliente['email'];
            
            // Itera sobre os itens do carrinho e insere no banco de dados
            foreach ($cartItems as $item) {
                $nome_produto = $item['nome_produto'];
                $quantidade = $item['quantidade'];
                $preco_total = $item['preco_total'];

                $sql = "INSERT INTO venda_site (nome_produto, quantidade, preco, nome_cliente, cpf, email, data_compra, hora_compra)
                        VALUES ('$nome_produto', $quantidade, $preco_total, '$nome_cliente', '$cpf_cliente', '$email_cliente', NOW(), NOW())";
                
                if ($conn->query($sql) === TRUE) {
                    echo "Registro inserido com sucesso: $nome_produto<br>";
                } else {
                    echo "Erro ao inserir registro: " . $conn->error;
                }
            }
        } else {
            echo "Nenhum cliente encontrado com o e-mail fornecido.";
        }
        
        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "Nenhum e-mail de cliente encontrado na sessão.";
    }
} else {
    // Caso não haja dados de carrinho enviados
    echo "Nenhum dado de carrinho enviado.";
}

?>
