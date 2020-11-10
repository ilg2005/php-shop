function emptyCart() {
    $.ajax({
        url: '/cart/empty',
        type: 'GET',
        success: function (cartHtml) {
            $('#cart .modal-content').html(cartHtml);
        },
        error: function () {
            alert('Ошибка!');
        }
    })
}

$('[data-toggle = modal]').on('click', function (e) {
    e.preventDefault();

    $.ajax( {
        url: '/cart/index',
        type: 'GET',
        success: function (cartHtml) {
            $('#cart .modal-content').html(cartHtml);
        },
        error: function () {
            alert('Ошибка!');
        }


    })



});

$('.product-button__add').on('click', function (evt) {
    evt.preventDefault();
    let name = $(this).data('name');

    $.ajax( {
        url: '/cart/add',
        data: {name: name},
        type: 'GET',
        success: function (cartHtml) {
            alert('Товар добавлен в корзину!');
            $('#cart .modal-content').html(cartHtml);
        },
        error: function () {
            alert('Ошибка: товар не добавлен в корзину!');
        }


    })
});
