<nav class="nav nav-menu">
    <a class="nav-link active" href="/">Всё меню</a>
    <?php foreach ($categories as $category) : ?>
        <a class="nav-link" href="/category/<?= $category->cat_name ?>"><?= $category->browser_name ?></a>
    <?php endforeach; ?>
</nav>
