<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Заказ № ' . $order->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="order-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Назад', ['/admin-order'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить', ['update', 'id' => $order->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $order->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данный заказ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $order,
        'attributes' => [
            'id',
            'date',
            'name',
            'email:email',
            'phone',
            'address',
            'sum',
            'status',
        ],
    ]) ?>

    <hr>
    <h3>Состав заказа</h3>
    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col">Наименование</th>
            <th scope="col">Количество</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($goods as $id => $good): ?>
            <tr data-id="<?= $id ?>">

                <td style="vertical-align: middle"><?= $good['name'] ?></td>
                <td style="vertical-align: middle"><?= $good['quantity'] ?> шт</td>
                <td style="vertical-align: middle"><?= $good['price'] * $good['quantity'] ?> рублей</td>
            </tr>
        <?php endforeach; ?>
        <tr style="border-top: 4px solid black">
            <td >Всего товаров</td>
            <td class="text-left"><span class="total-quantity"><?= count($goods) ?></span> шт</td>
            <td></td>
        </tr>
        <tr>
            <td >На сумму</td>
            <td></td>
            <td  class="text-left" style="font-weight: 700"><span class="total-price"><?= $order['sum'] ?></span> рублей</td>
        </tr>
        </tbody>

    </table>
</div>
