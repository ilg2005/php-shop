<?php

use app\models\OrderGood;
use sjaakp\bandoneon\Bandoneon;


if (!count($orders)) : ?>
    <h4> У Вас пока нет ни одного заказа </h4>
<?php else: ?>

    <?php Bandoneon::begin() ?>

    <?php foreach ($orders as $order) : ?>
        <h4>Заказ <strong><?= $order->id ?></strong> от <strong><?= $order->date ?>&nbsp;&nbsp;</strong>
            <button type="button" class="btn btn-success btn-sm">В корзину</button>
        </h4>
        <div>
            <table class="table table-striped">

                <thead>
                <tr>
                    <th scope="col">Наименование</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Цена</th>
                </tr>
                </thead>

                <tbody>
                <?php $goods = OrderGood::find()->where(['order_id' => $order->id])->all(); ?>
                <?php foreach ($goods as $id => $good): ?>

                    <tr data-id="<?= $id ?>">

                        <td style="vertical-align: middle"><?= $good->name ?></td>
                        <td style="vertical-align: middle"><?= $good->quantity ?> шт</td>
                        <td style="vertical-align: middle"><?= $good->price * $good->quantity ?> рублей</td>
                    </tr>
                <?php endforeach; ?>
                <tr style="border-top: 4px solid black">
                    <td>Всего товаров</td>
                    <td class="text-left"><span class="total-quantity"><?= count($goods) ?></span> шт</td>
                    <td></td>
                </tr>
                <tr>
                    <td>На сумму</td>
                    <td></td>
                    <td class="text-left" style="font-weight: 700"><span
                                class="total-price"><?= $order->sum ?></span> рублей
                    </td>
                </tr>
                </tbody>

            </table>
        </div>
    <?php endforeach ?>
    <?php Bandoneon::end() ?>
<?php endif; ?>
