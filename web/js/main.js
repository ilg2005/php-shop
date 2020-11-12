const modalContentElement = $('#modal .modal-content');

function emptyCart() {
        $.ajax({
            url: '/cart/empty',
            type: 'GET',
            success: function (cartIndexView) {
                modalContentElement.html(cartIndexView);
                $('.menu-quantity').html('0');
            },
            error: function () {
                alert('Ошибка!');
            }
        })
}

modalContentElement.on('click', '#empty', function (evt) {
    evt.preventDefault();
    if (confirm('Точно очистить корзину?')) {
        emptyCart();
    }
});


$('[data-toggle = modal]').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url: '/cart/index',
        type: 'GET',
        success: function (cartIndexView) {
            modalContentElement.html(cartIndexView);
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

modalContentElement.on('click', '.delete', function (evt) {
    evt.preventDefault();
    let tr = $(this.parentElement);
    let id = tr.data('id');

    $.ajax({
        url: '/cart/remove',
        data: {id: id},
        type: 'GET',
        success: function (recalculation) {
            $(tr).remove();
            let recalcObj = JSON.parse(recalculation);
            $('.total-quantity').html(recalcObj.totalQuantity);
            $('.total-price').html(recalcObj.totalPrice);
            $('.menu-quantity').html(recalcObj.totalQuantity);
            if (recalcObj.totalQuantity === 0) {
                emptyCart();
            }
        },
        error: function () {
            alert('Ошибка: товар не удален из корзины!');
        }
    })
});

modalContentElement.on('click', '#order', function (evt) {
    evt.preventDefault();
    $.ajax({
        url: '/cart/order',
        type: 'POST',
        success: function (cartOrderView) {
            modalContentElement.html(cartOrderView);
            $('.menu-quantity').html('0');
        },
        error: function () {
            alert('Ошибка: заказ не отправлен!');
        }
    })

});
