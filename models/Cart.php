<?php


namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($good) {

        if (isset($_SESSION['cart'][$good->id])) {
            ++$_SESSION['cart'][$good->id]['quantity'];

        } else {
            $_SESSION['cart'][$good->id] = [
                'name' => $good['name'],
                'price' => $good['price'],
                'img' => $good['img'],
                'quantity' => 1,
            ];

            $_SESSION['cart.totalQuantity'] = isset($_SESSION['cart.totalQuantity']) ? ++$_SESSION['cart.totalQuantity'] : 1;
            $_SESSION['cart.totalPrice'] += $good['price'];


        }

    }

}
