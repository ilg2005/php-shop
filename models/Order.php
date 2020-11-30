<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Order extends ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }

    public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::class, ['order_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['email'], 'email'],
            [['name', 'email', 'phone', 'address', 'status'], 'string', 'max' => 255],
        ];
    }


}
