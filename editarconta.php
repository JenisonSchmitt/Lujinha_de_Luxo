<?php
session_start();

// Verifica se o cliente está logado
if (!isset($_SESSION['email'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.html");
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "**********";
    $username = "**********";
    $password = "**********";
    $dbname = "**********";
    
    // Recupera o e-mail da sessão
    $email_logado = $_SESSION['email'];
    
    // Recupera os dados do formulário
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepara e executa a query para atualizar os dados do cliente
    $sql = "UPDATE cliente SET telefone=?, email=?, endereco=? WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $telefone, $email, $endereco, $email_logado);

    if ($stmt->execute()) {
        $redirectSuccess = true;
    } else {
        $redirectError = true;
        $conn->error;
    }

    // Fecha a conexão
    $stmt->close();
    $conn->close();
}
?>

<?php if (isset($redirectSuccess) && $redirectSuccess): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Atualização bem-sucedida!',
                showConfirmButton: false,
                timer: 1500
            }).then(function () {
                window.location.href = 'conta.html#logar';
            });
        });
    </script>
<?php elseif (isset($redirectError) && $redirectError): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Erro de atualização',
                text: 'Por favor, tente novamente!',
                showConfirmButton: false,
                timer: 1500
            }).then(function () {
                window.location.href = 'editarconta.html#editar';
            });
        });
    </script>
<?php endif; ?>
