<?php
session_start();

$servername = "localhost";
$database = "u228502032_Lujinha";
$username = "u228502032__ldl";
$password = "#ldlLujinha_2519";

$email = $_POST['email'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepara e executa a query para atualizar a senha do cliente
$sql = "UPDATE cliente SET senha='$senha' WHERE email='$email' AND cpf='$cpf'";
if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows > 0) {
        // Define a variável $redirectSuccess como true
        $redirectSuccess = true;
    } else {
        // Define a variável $redirectError como true
        $redirectError = true;
    }
} else {
    // Define a variável $redirectError como true em caso de erro na consulta
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
                title: 'Senha Redefinida!',
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
                title: 'Erro ao Redefinir',
                text: 'Tente novamente ou entre em contato conosco pelo (48) 99138-3245!',
                showConfirmButton: false,
                timer: 6500
            }).then(function () {
                window.location.href = 'redefinirsenha.html#redefinir';
            });
        });
    </script>
<?php endif; ?>
