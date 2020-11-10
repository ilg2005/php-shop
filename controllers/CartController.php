<?php


namespace app\controllers;


use app\models\Good;
use yii\web\Controller;
use app\models\Cart;
use Yii;

class CartController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
       /* $session->remove('cart');
        $session->remove('totalQuantity');
        $session->remove('totalPrice');*/
        return $this->renderPartial('index', compact('session'));
    }

    public function actionAdd($name)
    {
        $session = Yii::$app->session;
        $session->open();
        $model = new Good();
        $good = $model->getSpecificGood($name);
        $cart = new Cart();
        $cart->addToCart($good);
    }

}
