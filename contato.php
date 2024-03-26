<?php

$nome = $_POST['name'];
$cpf = $_POST['cpf'];
$mensagem = $_POST['message'];

echo "<!DOCTYPE html>
<html class='no-js' lang='en'>

<head>
    <title>LdL - Lujinha de Luxo</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='format-detection' content='telephone=no'>
    <meta name='apple-mobile-web-app-capable' content='yes'>
    <meta name='author' content='TemplatesJungle'>
    <meta name='keywords' content='Free HTML Template'>
    <meta name='description' content='Free HTML Template'>
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
</head>

<body>

    <div class='main-logo'>
        <a href=''>LdL</a>
    </div>  

    <section id='intro' class='scrollspy-section'>
        <div class='main-slider'>
            <div class='slider-item jarallax' data-speed='0.2'>
                <img src='images/foto13.png' alt='banner' class='jarallax-img'>
                <div class='banner-content'>
                    <h2 class='banner-title txt-fx'>Lujinha de Luxo</h2>
                </div>
            </div>
        </div>
    </section>
    <center>
    <section id='about' class='scrollspy-section bg-personality_0 padding-xlarge'>
        <div class='btn-wrap'>
            <a href='https://api.whatsapp.com/send?phone=48991383245&amp;text=Olá, me chamo $nome, inscrito no CPF $cpf e tenho uma mensagem para você: $mensagem!' class='btn btn-accent btn-xlarge btn-rounded'>Enviar Mensagem</a>
        </div>
    </center>
    </section>
    <script src='js/jquery-1.11.0.min.js'></script>
    <script src='js/ui-easing.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm'
        crossorigin='anonymous'></script>
    <script src='https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js'></script>
    <script src='js/plugins.js'></script>
    <script src='js/script.js'></script>

</body>

</html>";

?>