<?php

use yii\helpers\Url;

?>
<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-8 justify-self-center">
            <h2><div class="product-title text-center"><?= $good->name ?></div></h2>
            <div class="product">
                <div class="product-img">
                    <img src="/img/<?= $good->img ?>" alt="Филадельфия">
                </div>
                <div class="product-name"><?= $good->name ?></div>
                <div class="product-descr">Состав: <?= $good->composition ?></div>
                <div class="product-descr">Описание: <?= $good->descr ?></div>
                <div class="product-price">Цена: <?= $good->price ?> рублей</div>
                <div class="container">
                    <div class="row justify-content-center">
                <div class="product-buttons">
                    <a href="#" type="button" class="product-button__add btn btn-lg btn-success mr-3 ">Заказать</a>
                    <a href="<?= Url::home() ?>" type="button" class="product-button__more btn btn-primary btn-lg">Назад </a>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
