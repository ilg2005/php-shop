<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\OrderFormWidget;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
$session = Yii::$app->session;
$session->open();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<section class="body">
    <header>
        <div class="container">
            <div class="header">
                <form action="<?= Url::to(['category/index']) ?>" method="get">
                    <input type="text" style="padding: 5px" placeholder="Поиск..." name="search">
                </form>
                <?= Yii::$app->user->identity->is_admin ? '<a href="/admin">Админка</a>' : '<a href="/">На главную</a>'?>

                <a href="#" data-toggle="modal" data-target="#modalCart">Корзина (<span
                            class="menu-quantity"><?= $session['totalQuantity'] ?? 0 ?></span>)</a>
                <?php if (Yii::$app->user->isGuest) : ?>
                    <div class="row header">
                        <a class="mr-2" href="/site/login">Вход</a>
                        /
                        <a class="ml-2" href="/site/signup" >Регистрация</a>
                    </div>
                <?php else : ?>
                    <a href="/site/logout">Выход</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div class="container">
        <?= $content ?>
    </div>

    <footer>
        <div class="container">
            <div class="footer">
                &copy; Все права защищены
            </div>
        </div>
    </footer>
</section>

<!-- Modal -->
<div class="modal fade" id="modalCart" data-keyboard="false" tabindex="-1" aria-labelledby="modalCartLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"></div>
    </div>
</div>

<?= OrderFormWidget::widget([]) ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
