<?php


namespace app\controllers;


use app\models\Category;
use app\models\Good;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionIndex($catName = '') {
        $model = new Good();
        $goods = $model->getAllGoods();
        if ($catName) {
            $goods = $model->getGoodsByCategory($catName);
        }

        return $this->render('index', compact('goods'));
    }



}
