$('.product-button__add').on('click', function (evt) {
    evt.preventDefault();
    let name = $(this).data('name');

    $.ajax( {
        url: 'cart/add',
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
