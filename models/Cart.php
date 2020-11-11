<?php


namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public $totalQuantity;
    public $totalPrice;

    public function addToCart($good)
    {

        if (isset($_SESSION['cart'][$good->id])) {
            ++$_SESSION['cart'][$good->id]['quantity'];
        } else {
            $_SESSION['cart'][$good->id] = [
                'name' => $good['name'],
                'price' => $good['price'],
                'img' => $good['img'],
                'quantity' => 1,
            ];
        }
        $_SESSION['totalQuantity'] = isset($_SESSION['totalQuantity']) ? ++$_SESSION['totalQuantity'] : 1;
        $_SESSION['totalPrice'] = isset($_SESSION['totalPrice']) ? $_SESSION['totalPrice'] + $_SESSION['cart'][$good->id]['price'] : $_SESSION['cart'][$good->id]['price'];
        $this->totalQuantity = $_SESSION['totalQuantity'];
        $this->totalPrice = $_SESSION['totalPrice'];
    }


}
