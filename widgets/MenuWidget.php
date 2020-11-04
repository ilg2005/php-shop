<?php


namespace app\widgets;


use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{

    public function run()
    {
        $model = new Category();
        $categories = $model->getCategories();
        return $this->render('menu', compact('categories'));
    }
}
