<nav class="nav nav-menu">
    <a class="nav-link active" href="/">Всё меню</a>
    <?php use yii\helpers\Url;

    foreach ($categories as $category) : ?>
        <a class="nav-link" href="<?= Url::to(['category/index', 'catName' => $category->cat_name]) ?>"><?= $category->browser_name ?></a>
    <?php endforeach; ?>
</nav>
