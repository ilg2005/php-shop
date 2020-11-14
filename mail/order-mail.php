<h3>Ваш заказ принят!Номер заказа: <?= $order->id ?> </h3>
<p>Наш менеджер свяжется с Вами по телефону: <?= $model->phone ?></p>

<div class="table-responsive">
    <table class="table table-bordered bg-success" style="border-collapse: collapse;">

        <thead>
        <tr style="background: #f9f9f9;">
            <th style="padding: 8px; border: 1px solid #ddd;" scope="col">Наименование</th>
            <th style="padding: 8px; border: 1px solid #ddd;" scope="col">Количество</th>
            <th style="padding: 8px; border: 1px solid #ddd;" scope="col">Цена</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($session['cart'] as $id => $good): ?>
            <tr data-id="<?= $id ?>">
                <td style="padding: 8px; border: 1px solid #ddd; vertical-align: middle;"><?= $good['name'] ?></td>
                <td style="padding: 8px; border: 1px solid #ddd; vertical-align: middle;"><?= $good['quantity'] ?>шт
                </td>
                <td style="padding: 8px; border: 1px solid #ddd; vertical-align: middle;"><?= $good['price'] * $good['quantity'] ?>
                    рублей
                </td>
            </tr>
        <?php endforeach; ?>
        <tr style="border-top: 4px solid black">
            <td colspan="2">Всего товаров</td>
            <td class="text-center"><span class="total-quantity"><?= $session['totalQuantity'] ?></span> шт</td>
        </tr>
        <tr>
            <td colspan="2">На сумму</td>
            <td class="" style="font-weight: 700"><span class="total-price"><?= $session['totalPrice'] ?></span> рублей
            </td>
        </tr>
        </tbody>

    </table>
</div>
