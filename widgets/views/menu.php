<?php

use yii\helpers\Url;

$currentUrl = Yii::$app->request->url;
?>

<nav class="nav nav-menu">
    <a class="nav-link <?= ($currentUrl === '/') ? 'active' : '' ?>" href="/">Всё меню</a>


    <?php foreach ($categories as $category) : ?>
        <a class="nav-link <?= ($currentUrl === '/category/' . $category->cat_name) ? 'active' : '' ?>"
           href="<?= Url::to([
               'category/index',
               'catName' => $category->cat_name
           ]) ?>"><?= $category->browser_name ?></a>
    <?php endforeach; ?>
</nav>
