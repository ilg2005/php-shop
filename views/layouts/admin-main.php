<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AdminAppAsset;
use app\widgets\OrderFormWidget;
use yii\helpers\Html;
use yii\helpers\Url;

AdminAppAsset::register($this);
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
                <a href="/">На главную</a>
                <a href="/admin">Вход в админку</a>
                <form action="<?= Url::to(['category/index']) ?>" method="get">
                    <input type="text" style="padding: 5px" placeholder="Поиск..." name="search">
                </form>
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


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
