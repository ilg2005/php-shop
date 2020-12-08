<?php

use app\models\OrderGood;
use sjaakp\bandoneon\Bandoneon;
use yii\helpers\Url;

?>
<?php if( Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible text-center col-6 offset-3" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif;?>
<div class="container mt-5">
    <?php if (!count($orders)) : ?>
        <h4 class="text-center"> У Вас пока нет ни одного заказа </h4>
    <?php else: ?>
        <?php foreach ($orders as $order) : ?>
            <div class="row mb-3 justify-content-center">

                <?php Bandoneon::begin() ?>
                <h4 class="mr-5">Заказ <strong><?= $order->id ?></strong> от <strong><?= $order->date ?></strong></h4>
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
                        <?php $orderQty = 0; ?>
                        <?php foreach ($order->getGoods($order->id) as $id => $good): ?>

                            <tr data-id="<?= $id ?>">

                                <td style="vertical-align: middle"><?= $good->name ?></td>
                                <td style="vertical-align: middle"><?= $good->quantity ?> шт</td>
                                <td style="vertical-align: middle"><?= $good->price * $good->quantity ?> рублей</td>
                            </tr>
                        <?php $orderQty += $good->quantity;
                        endforeach; ?>
                        <tr style="border-top: 4px solid black">
                            <td>Всего товаров</td>
                            <td class="text-left"><span class="total-quantity"><?= $orderQty ?></span> шт</td>
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
                    <a href="<?= Url::toRoute(['cart/add-order', 'orderID' => $order->id]) ?>" class="btn btn-success btn-sm toCart btn-block">В корзину</a>
                </div>
                <?php Bandoneon::end() ?>

            </div>
        <?php endforeach ?>

    <?php endif; ?>
</div>
