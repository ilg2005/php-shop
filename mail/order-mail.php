<p><?= $model->name ?>, спасибо за заказ!</p>
<p id="yourOrder">Номер Вашего заказа: <strong><?= $order->id ?></strong>. Вы заказали:</p>
<div class="table-responsive">
    <table style="border-collapse: collapse;" aria-describedby="yourOrder">
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
                <td style="padding: 8px; border: 1px solid #ddd; vertical-align: middle; text-align: center;"><?= $good['quantity'] ?> шт
                </td>
                <td style="padding: 8px; border: 1px solid #ddd; vertical-align: middle;"><?= $good['price'] * $good['quantity'] ?>
                    рублей
                </td>
            </tr>
        <?php endforeach; ?>
        <tr style="border-top: 2px solid black">
            <td>Всего товаров:</td>
            <td style="text-align: center;"><span class="total-quantity"><?= $session['totalQuantity'] ?></span> шт</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">На сумму:</td>
            <td style="font-weight: 700"><span class="total-price"><?= $session['totalPrice'] ?></span> рублей
            </td>
        </tr>
        </tbody>

    </table>
    <p>Наш менеджер свяжется с Вами по телефону <?= $model->phone ?> для согласования доставки.</p>

</div>
