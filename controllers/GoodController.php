<?php


namespace app\controllers;


use app\models\Good;
use Yii;
use yii\web\Controller;

class GoodController extends Controller
{
    public function actionIndex($name) {
        $session = Yii::$app->session;
        $session->open();
        $model = new Good();
        $good = $model->getSpecificGood($name);
        return $this->render('index', compact('good'));
    }

}
