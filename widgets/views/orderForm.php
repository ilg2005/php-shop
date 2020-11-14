<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>

    <?php
    $this->registerJs(
        "$('.menu-quantity').html('0');
        $('#orderSuccess').modal('show');",
        yii\web\View::POS_READY
    );
    ?>

    <!-- OrderSuccess Modal -->

    <div class="modal fade" id="orderSuccess" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="orderSuccessLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header border-0 alert-success">
                    <h3 class="alert-heading" id="cartLabel">Заявка успешно отправлена!</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="goHome()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body alert-success">
                    <p>Спасибо, <?= $model->name ?>!</p>
                    <p>Наш менеджер свяжется с Вами в ближайшее время по телефону <strong><?= $model->phone ?></strong>
                        для подтверждения заказа.</p>
                    <hr>
                    <p class="mb-0">Номер вашего заказа: <strong><?= $order->id ?></strong>, общая сумма:
                        <strong><?= $order->sum ?></strong> руб.</p>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<!-- OrderForm Modal -->

<div class="modal fade" id="orderModal" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="modal-header border-0">
                <h2 class="modal-title" id="cartLabel">Оформление заказа</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'phone') ?>
                <?= $form->field($model, 'address') ?>

            </div>
            <div class="modal-footer modal-buttons justify-content-around border-0 mb-3">
                <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
