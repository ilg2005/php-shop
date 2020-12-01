<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'date',
                'label' => 'Дата заказа'
            ],
            [
                'attribute' => 'name',
                'label' => 'Имя'
            ],
            [
                'attribute' => 'email',
                'label' => 'E-mail'
            ],
            [
                'attribute' => 'phone',
                'label' => 'Телефон'
            ],
            [
                'attribute' => 'address',
                'label' => 'Адрес'
            ],
            [
                'attribute' => 'sum',
                'label' => 'Сумма'
            ],
            [
                'attribute' => 'status',
                'label' => 'Статус',
                'value' => function ($info) {
                    return $info->status === 'Новый' ? "<div style='color: red'>$info->status</div>" : "<div style='color: green'>$info->status</div>";
                },
                'format' => 'raw'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>


</div>
