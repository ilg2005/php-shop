<?php

use yii\helpers\Url;
use yii\widgets\Menu;

$items[] = [ 'label' => 'Всё меню', 'url' => '/category/index' ];

foreach ($categories as $category) {
    $items[] = ['label' => $category->browser_name, 'url' => Url::to(['category/index', 'catName' => $category->cat_name])];
      }

Menu::widget([
    'options' => ['class' => 'nav nav-menu'],
    'items' => $items,
    'activeCssClass' => 'active',
]);
print_r($items);

?>

<nav class="nav nav-menu">
    <a class="nav-link active" href="/">Всё меню</a>


    <?php foreach ($categories as $category) : ?>
        <a class="nav-link"
           href="<?= Url::to(['category/index', 'catName' => $category->cat_name]) ?>"><?= $category->browser_name ?></a>
    <?php endforeach; ?>
</nav>
