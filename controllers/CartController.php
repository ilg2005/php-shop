<?php


namespace app\controllers;


use app\models\Good;
use app\models\Order;
use app\models\OrderForm;
use app\models\OrderGood;
use yii\web\Controller;
use app\models\Cart;
use Yii;

class CartController extends Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
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
        return $session['totalQuantity'];
    }

    public function actionRemove($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->removeFromCart($id);
        $totalQuantity = $session['totalQuantity'];
        $totalPrice = $session['totalPrice'];
        return json_encode(compact('totalQuantity', 'totalPrice'));
    }

    public function actionEmpty()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('totalQuantity');
        $session->remove('totalPrice');
        return $this->renderPartial('index', compact('session'));
    }

    public function actionOrder()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        $model = new OrderForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $order->name = $model->name;
            $order->email = $model->email;
            $order->phone = $model->phone;
            $order->address = $model->address;
            $order->date = date('Y-m-d H:i:s');
            $order->sum = $session['totalPrice'];
            if ($order->save()) {
                $session->remove('cart');
                $session->remove('totalQuantity');
                $session->remove('totalPrice');
                return $this->render('success', compact('session', 'model'));
            }
        }
        $this->layout = 'empty';
        return $this->render('order', compact('session', 'model', 'order'));
    }
}
