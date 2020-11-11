function emptyCart() {
    if (confirm('Точно очистить корзину?')) {
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
}

$('[data-toggle = modal]').on('click', function (e) {
    e.preventDefault();

    $.ajax({
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

    $.ajax({
        url: '/cart/add',
        data: {name: name},
        type: 'GET',
        success: function (totalQuantity) {
            alert('Товар добавлен в корзину!');
            $('.menu-quantity').html(totalQuantity);
        },
        error: function () {
            alert('Ошибка: товар не добавлен в корзину!');
        }
    })
});

$('.modal-content').on('click', '.delete', function (evt) {
    evt.preventDefault();
    let tr = $(this.parentElement);
    let id = tr.data('id');

    $.ajax({
        url: '/cart/remove',
        data: {id: id},
        type: 'GET',
        success: function (data) {
            $(tr).remove();
            let dataObj = JSON.parse(data);
            $('.total-quantity').html(dataObj.totalQuantity);
            $('.total-price').html(dataObj.totalPrice);
            $('.menu-quantity').html(dataObj.totalQuantity);
        },
        error: function () {
            alert('Ошибка: товар не удален из корзины!');
        }
    })
});
