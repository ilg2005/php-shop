<?php


namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart() {
        $_SESSION['cart'] += 1;
    }
}
