<?php


namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function addToCart($good)
    {
        $session = Yii::$app->session;
        $session->open();

        $cart = $session['cart'];

        if (isset($cart[$good->id])) {
            ++$cart[$good->id]['quantity'];
        } else {
            $cart[$good->id] = [
                'name' => $good['name'],
                'price' => $good['price'],
                'img' => $good['img'],
                'quantity' => 1,
            ];
        }

        $session['totalQuantity'] = isset($session['totalQuantity']) ? ++$session['totalQuantity'] : 1;
        $session['totalPrice'] = isset($session['totalPrice']) ? $session['totalPrice'] + $cart[$good->id]['price'] : $cart[$good->id]['price'];

        $session['cart'] = $cart;

    }

    public function removeFromCart($id)
    {
        $session = Yii::$app->session;
        $session->open();

        $cart = $session['cart'];

        if (isset($cart[$id])){
            $session['totalQuantity'] -= $cart[$id]['quantity'];
            $session['totalPrice'] -= $cart[$id]['price'] * $cart[$id]['quantity'];
            unset($cart[$id]);
        }
        $session['cart'] = $cart;
    }


}
