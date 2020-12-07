<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Good;
use app\models\Order;
use app\models\OrderGood;
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
