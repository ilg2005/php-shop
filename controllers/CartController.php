<?php


namespace app\controllers;


use app\models\Good;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionAdd($name) {
        $model = new Good();
        $good = $model->getSpecificGood($name);
        return $this->renderPartial('add', compact('good'));
    }

}
