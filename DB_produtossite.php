<?php
$servername = "**********";
$username = "**********";
$password = "**********";
$dbname = "**********";

$nomehtml = $_POST['nomehtml'];
$nome = $_POST['nomeProduto'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$marca = $_POST['marca'];
$quantidade = $_POST['quantidade'];
$codigo = $_POST['codigo'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
$sql1 = "UPDATE `produtos_site` SET `nomehtml` = '$nomehtml', `nome` = '$nome', `descricao` = '$descricao', `valor` = '$valor', `marca` = '$marca', `quantidade` = '$quantidade' WHERE `codigo` = '$codigo'";
$sql2 = "UPDATE `produto` SET `valor` = '$valor' WHERE `codigo` = '$codigo'";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

if ($result1 && $result2) {
      echo "
<!DOCTYPE html>
      <html class='no-js' lang='pt'>
            <head>
                  <title>LdL - Lujinha de Luxo</title>
                  <meta charset='utf-8'>
                  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <meta name='format-detection' content='telephone=no'>
                  <meta name='apple-mobile-web-app-capable' content='yes'>
                  <meta name='author' content='TemplatesJungle'>
                  <meta name='keywords' content='Sua 'Lujinha' virtual'>
                  <meta name='description' content='Sua 'Lujinha' virtual'>
                  <link rel='stylesheet' type='text/css' href='icomoon/icomoon.css'>
                  <link rel='stylesheet' type='text/css' href='css/vendor.css'>
                  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css' rel='stylesheet'
                  integrity='sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9' crossorigin='anonymous'>
                  <link rel='stylesheet' type='text/css' href='style.css'>
                  <link rel='preconnect' href='https://fonts.googleapis.com'>
                  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                  <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap'
                  rel='stylesheet'>
                  <link rel='shortcut icon' type='imagex/png' href='images/icone.ico'>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <title>Formulário</title>
            </head>
            <body>
                  <section class='scrollspy-section bg-personality_14 padding-xlarge_1 center' >
                        <div class='btn-wrap'>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <h3 class='paragrafo_5'>Produto Atualizado</h3>
                        </div>
                        <br>
                        <div class='btn-wrap'>
                              <a href='https://www.lujinhadeluxo.com.br/admin/produtossite.html' class='btn btn-accent btn-xlarge btn-rounded'>Atualizar mais Produtos</a>
                        </div>
                  </section>
                  <script src='js/jquery-1.11.0.min.js'></script>
                  <script src='js/ui-easing.js'></script>
                  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js'integrity='sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm'crossorigin='anonymous'></script>
                  <script src='https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js'></script>
                  <script src='js/plugins.js'></script>
                  <script src='js/script.js'></script>
            </body>
      </html>";
} else {
      echo "
<!DOCTYPE html>
      <html class='no-js' lang='pt'>
            <head>
                  <title>LdL - Lujinha de Luxo</title>
                  <meta charset='utf-8'>
                  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <meta name='format-detection' content='telephone=no'>
                  <meta name='apple-mobile-web-app-capable' content='yes'>
                  <meta name='author' content='TemplatesJungle'>
                  <meta name='keywords' content='Sua 'Lujinha' virtual'>
                  <meta name='description' content='Sua 'Lujinha' virtual'>
                  <link rel='stylesheet' type='text/css' href='icomoon/icomoon.css'>
                  <link rel='stylesheet' type='text/css' href='css/vendor.css'>
                  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css' rel='stylesheet'
                  integrity='sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9' crossorigin='anonymous'>
                  <link rel='stylesheet' type='text/css' href='style.css'>
                  <link rel='preconnect' href='https://fonts.googleapis.com'>
                  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                  <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap'
                  rel='stylesheet'>
                  <link rel='shortcut icon' type='imagex/png' href='images/icone.ico'>
                  <meta charset='UTF-8'>
                  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                  <title>Formulário</title>
            </head>
            <body>
                  <section class='scrollspy-section bg-personality_14 padding-xlarge_1 center' >
                        <div class='btn-wrap'>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <br>
                              <h3 class='paragrafo_5'>Produto não atualizado, por favor, volte e verifique os dados</h3>
                        </div>
                        <br>
                        <div class='btn-wrap'>
                              <a href='https://www.lujinhadeluxo.com.br/admin/produtosiste.html' class='btn btn-accent btn-xlarge btn-rounded'>Atualizar novamente</a>
                        </div>
                  </section>
                  <script src='js/jquery-1.11.0.min.js'></script>
                  <script src='js/ui-easing.js'></script>
                  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js'integrity='sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm'crossorigin='anonymous'></script>
                  <script src='https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js'></script>
                  <script src='js/plugins.js'></script>
                  <script src='js/script.js'></script>
            </body>
      </html>";
}
?>
