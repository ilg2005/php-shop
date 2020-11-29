<?php

use yii\helpers\Url;
use yii\widgets\Menu;

$items[] = [ 'label' => 'Всё меню', 'url' => '/category/index' ];

foreach ($categories as $category) {
    $items[] = ['label' => $category->browser_name, 'url' => Url::to(['category/index', 'catName' => $category->cat_name])];
      }

echo Menu::widget([
    'options' => ['class' => 'nav nav-menu'],
    'items' => $items,
    'activeCssClass' => 'active',
]);
$currentUrl = Yii::$app->request->url;

?>

<nav class="nav nav-menu">
    <a class="nav-link <?=($currentUrl === '/') ? 'active' : '' ?>" href="/">Всё меню</a>


    <?php foreach ($categories as $category) : ?>
        <a class="nav-link <?=($currentUrl === '/category/' . $category->cat_name) ? 'active' : '' ?>"
           href="<?= Url::to(['category/index', 'catName' => $category->cat_name]) ?>"><?= $category->browser_name ?></a>
    <?php endforeach; ?>
</nav>
