<?php
    session_start();

    $servername = "localhost";
    $database = "u228502032_Lujinha";
    $username = "u228502032__ldl";
    $password = "#ldlLujinha_2519";

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica a conexão
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepara e executa a query para atualizar a senha do cliente
    $sql = "INSERT INTO cliente (CPF, nome, telefone, email, nascimento, endereco, senha) VALUES ('$cpf', '$nome', '$telefone', '$email', STR_TO_DATE('$nascimento','%d/%m/%Y'), '$endereco', '$senha')";
    
    $result = $conn->query($sql);
        
    if ($result === TRUE) {
        $redirectSuccess = true;
    } else {
        $redirectError = true;
    }

    // Fecha a conexão
    $conn->close();
?>

<?php if (isset($redirectSuccess) && $redirectSuccess): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Cadastro realizado com sucesso!',
                showConfirmButton: false,
                timer: 1500
            }).then(function () {
                window.location.href = 'login.html#logar';
            });
        });
    </script>
<?php elseif (isset($redirectError) && $redirectError): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Erro de autenticação',
                text: 'Senha ou e-mail incorretos!',
                showConfirmButton: true,
                timer: 1500
            }).then(function () {
                window.location.href = 'login.html#logar';
            });
        });
    </script>
<?php endif; ?>
