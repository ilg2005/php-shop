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

        $session['totalQuantity'] += 1;

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

    public function addOrder2Cart($products) {
        $session = Yii::$app->session;
        $session->open();
        $cart = $session['cart'];
        $totalQty = $session['totalQuantity'];
        $totalPrice = $session['totalPrice'];

        foreach ($products as $product) {
            $goodID = $product['product_id'];
            $good = Good::find()->where(['id'=> $goodID])->one();
            $goodQty = $product['quantity'];
            $goodName = $good['name'];
            $goodImg = $good['img'];

            if (isset($cart[$goodID])) {
                $cart[$goodID]['quantity'] += $goodQty;
                $cart[$goodID]['price'] += $goodPrice;
            } else {
                $cart[$goodID] = [
                    'name' => $goodName,
                    'price' => $good['price'],
                    'img' => $goodImg,
                    'quantity' => $goodQty,
                ];
            }
            $totalQty += $goodQty;
            $totalPrice += $good['price'] * $goodQty;
            $session['cart'] = $cart;
        }
        $session['totalQuantity'] = $totalQty;
        $session['totalPrice'] = $totalPrice;
    }

}
