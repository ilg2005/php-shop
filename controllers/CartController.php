<?php


namespace app\controllers;


use app\models\Good;
use yii\web\Controller;
use app\models\Cart;
use Yii;

class CartController extends Controller
{
    public function actionAdd($name) {
        $model = new Good();
        $good = $model->getSpecificGood($name);
        $session = Yii::$app->session;
        $session->open();
      //  $session->remove('cart');
        $cart = new Cart();
        $cart->addToCart($good);
        return $this->renderPartial('add', compact('good', 'session'));
    }

}
