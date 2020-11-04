<?php


namespace app\controllers;


use app\models\Category;
use app\models\Good;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionIndex() {
        $model = new Good();
        $goods = $model->getAllGoods();
/*        $category = Yii::$app->controller->action->id;
        if ($category) {
            $goods = $model->getGoodsByCategory($category);
        }*/

        return $this->render('index', compact('goods'));
    }


}
