$(document).ready(function () {
    var disponivel = "Produto disponível para entrega imediata";
    $('h6.disponivel').text(disponivel);

    var parcelamento = "(Parcelamento em até 3x sem juros";
    $('h6.parcelamento').text(parcelamento);
});


$(document).ready(function () {
    // Fazer uma solicitação AJAX para buscar todos os produtos
    $.ajax({
        url: 'buscar_produtos_site.php',
        dataType: 'json',
        success: function (data) {
            // Iterar sobre os produtos e adicionar os dados aos elementos HTML correspondentes
            data.forEach(function (produto) {
                // Adicionar os dados ao elemento com base no nomehtml
                var elemento = $('#' + produto.nomehtml);
                elemento.find('h3').text(produto.nome);

                // Verificar se a quantidade restante é maior ou igual a 1
                if (produto.quantidade_restante >= 1) {
                    elemento.find('h6.disponivel').text("Produto disponível para entrega imediata").css('color', 'black');
                } else {
                    // Caso a quantidade seja 0, exibir "Produto esgotado no momento" em vermelho
                    elemento.find('h6.disponivel').text("Produto esgotado no momento").css('color', 'red');
                }

                // Usar toFixed para formatar o valor com duas casas decimais
                var valorFormatado = parseFloat(produto.valor).toFixed(2);

                // Adicionar o valor formatado ao h4
                elemento.find('h4').text('R$ ' + valorFormatado);
                // Adicionar outros dados conforme necessário
            });
        }
    });
});


function addToCart(productId) {
    // Modificado para encontrar o input de quantidade corretamente
    var quantityInput = $('#' + productId).find('.quantity-input');
    var quantity = quantityInput.val();
    var price = $('#' + productId).find('h4.preco').text().trim();
    var productName = $('#' + productId).find('h3.titulo').text().trim();

    var disponibilidade = $('#' + productId).find('h6.disponivel').text().trim();
    if (disponibilidade === "Produto esgotado no momento") {
        Swal.fire({
            icon: 'error',
            title: 'Produto esgotado!',
            text: 'Este produto está esgotado no momento.',
            showConfirmButton: false,
            timer: 1000
        });
        return; // Sair da função se o produto estiver esgotado
    }

    console.log('Produto ID:', productName);  // Agora exibindo o "Produto ID" como o conteúdo do h3.titulo
    console.log('Quantidade:', quantity);
    console.log('Preço:', price);

    var cart = JSON.parse(localStorage.getItem('cart')) || {};

    // Armazena o preço como um número
    price = parseFloat(price.replace('R$ ', ''));

    cart[productName] = {  // Usando o conteúdo do h3.titulo como "Produto ID"
        label: productName,
        quantity: quantity,
        price: price
    };

    localStorage.setItem('cart', JSON.stringify(cart));

    Swal.fire({
        icon: 'success',
        title: 'Produto adicionado ao carrinho!',
        showConfirmButton: false, // Não exibe o botão de confirmação
        timer: 1000 // Tempo em milissegundos antes de fechar automaticamente (1 segundo neste caso)
    });
}

    $('.button_car').on('click', function () {
        var productLabel = $(this).closest('.portfolio-item').find('.titulo').text();
        var productId = $(this).closest('.portfolio-item').attr('id');

        // Chame a função com os parâmetros necessários
        addToCart(productLabel, productId);
    });

function showProductSection(sectionId) {
    // Oculta a seção atualmente ativa
    $('.product-section-nav.active').removeClass('active');
    
    // Exibe a nova seção
    $('#' + sectionId).addClass('active');
}


$(document).ready(function(){
    $('.product-carousel').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button class="slick-prev" type="button"></button>',
        nextArrow: '<button type="button" class="slick-next">&#9654;</button>'
    });
});
