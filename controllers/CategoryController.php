<?php


namespace app\controllers;


use app\models\Category;
use app\models\Good;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionIndex($id = '') {
        $model = new Good();
        $goods = $model->getAllGoods();
        if ($id) {
            $goods = $model->getGoodsByCategory($id);
        }

        return $this->render('index', compact('goods'));
    }



}
