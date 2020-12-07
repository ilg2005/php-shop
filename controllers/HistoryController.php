<?php


namespace app\controllers;


use app\models\Order;
use Yii;
use yii\web\Controller;

class HistoryController extends Controller
{
    public function actionIndex()
    {
        $userID = Yii::$app->user->id;
        $orders = Order::find()->where(['user_id' => $userID])->all();

        return $this->render('index', compact ('orders'));

    }

}
