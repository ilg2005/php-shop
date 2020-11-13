<?php

use yii\helpers\Html;

?>
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Заявка успешно отправлена!</h4>
    <p>Вы ввели следующую информацию:</p>
    <ul>
        <li><label>Имя</label>: <?= Html::encode($model->name) ?></li>
        <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
        <li><label>Телефон</label>: <?= Html::encode($model->phone) ?></li>
        <li><label>Адрес</label>: <?= Html::encode($model->address) ?></li>
    </ul>
    <p>Наш менеджер свяжется с Вами в ближайшее время для подтверждения заказа.</p>
    <hr>
    <p class="mb-0">Номер вашего заказа <strong><?= $order->id ?></strong> на общую сумму <strong><?= $order->sum ?></strong> руб.</p>
</div>
