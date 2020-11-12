<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="modal-header border-0">
    <h2 class="modal-title" id="cartLabel">Оформление заказа</h2>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($order, 'name') ?>
    <?= $form->field($order, 'email') ?>
    <?= $form->field($order, 'phone') ?>
    <?= $form->field($order, 'address') ?>

</div>

<div class="modal-footer modal-buttons justify-content-around border-0 mb-3">
    <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>
