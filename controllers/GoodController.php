<?php


namespace app\controllers;

use app\models\Good;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GoodController extends Controller
{
    public function actionIndex($name)
    {
        $session = Yii::$app->session;
        $session->open();
        $model = new Good();
        $good = $model->getSpecificGood($name);
        $names = Good::find()->select('link_name')->column();
        if ($name && !in_array($name, $names)) {
            throw new NotFoundHttpException('Товар не существует');
        }
        return $this->render('index', compact('good', 'session'));
    }

}
