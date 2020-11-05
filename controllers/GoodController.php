<?php


namespace app\controllers;


use app\models\Good;
use yii\web\Controller;

class GoodController extends Controller
{
    public function actionIndex($name) {
        $model = new Good();
        $good = $model->getSpecificGood($name);
        return $this->render('index', compact('good'));
    }

}
