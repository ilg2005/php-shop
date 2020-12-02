<?php
/* @var $this yii\web\View */


$this->title = 'Регистрация';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<main class="site-login"">
<div class="container">
    <section class="registration__user">
        <h3>Регистрация аккаунта</h3>
        <p>Регистрация на сайте позволит Вам заказывать товары со скидкой и быть в курсе наших новостей!</p>

        <div class="registration-wrapper">

            <?php $form = ActiveForm::begin([
                'id' => 'signup',
                'layout' => 'horizontal',

                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'email', ['enableAjaxValidation' => 'true'])
                ->label('E-mail')
                ->input('email', [
                    'placeholder' => 'example@gmail.com',
                ])
            ?>

            <?= $form->field($model, 'username')
                ->label('Логин')
                ->textInput([
                    'placeholder' => 'username',
                ])
            ?>


            <?= $form->field($model, 'password')
                ->label('Пароль')
                ->passwordInput()
            ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Cоздать аккаунт', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </section>

</div>
</main>
