<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
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
                <a href="#">Вход в админку</a>
                <a href="#" data-toggle="modal" data-target="#cart">Корзина</a>
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

<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" aria-labelledby="cartLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="cartLabel">Корзина</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th scope="col">Фото</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td style="vertical-align: middle" width="150"><img src="/img/" alt="img"></td>
                        <td style="vertical-align: middle">test</td>
                        <td style="vertical-align: middle">test</td>
                        <td style="vertical-align: middle">1200 рублей</td>
                        <td class="delete" style="text-align: center; cursor: pointer; vertical-align: middle; color: red">
                            <span>&#10006;</span></td>
                    </tr>
                    <tr style="border-top: 4px solid black">
                        <td colspan="4">Всего товаров</td>
                        <td class="total-quantity">12></td>
                    </tr>
                    <tr>
                        <td colspan="4">На сумму </td>
                        <td style="font-weight: 700">1200 рублей</td>
                    </tr>
                    </tbody>

                </table>

            </div>
            <div class="modal-footer modal-buttons justify-content-around">
                <button type="button" class="btn btn-danger">Очистить корзину</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Продолжить покупки</button>
                <button type="button" class="btn btn-success btn-next">Оформить заказ</button>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
