<div class="modal-header border-0">
    <h2 class="modal-title" id="cartLabel">Корзина</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col">Фото</th>
            <th scope="col">Наименование</th>
            <th scope="col">Количество</th>
            <th scope="col">Цена</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td style="vertical-align: middle" width="150"><img src="/img/<?= $good->img ?>" alt="Изображение <?= $good->name ?>"></td>
            <td style="vertical-align: middle"><?= $good->name ?></td>
            <td style="vertical-align: middle">шт</td>
            <td style="vertical-align: middle"><?= $good->price ?> рублей</td>
            <td class="delete" style="text-align: center; cursor: pointer; vertical-align: middle; color: red">
                <span>&#10006;</span></td>
        </tr>
        <tr style="border-top: 4px solid black">
            <td colspan="4">Всего товаров</td>
            <td class="total-quantity">---></td>
        </tr>
        <tr>
            <td colspan="4">На сумму </td>
            <td style="font-weight: 700">--- рублей</td>
        </tr>
        </tbody>

    </table>

</div>
<div class="modal-footer modal-buttons justify-content-around border-0 mb-3">
    <button type="button" class="btn btn-danger">Очистить корзину</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Продолжить покупки</button>
    <button type="button" class="btn btn-success btn-next">Оформить заказ</button>
</div>

