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

    /*public function getGoods()
    {
        return $this->hasMany(Good::class, ['id' => 'product_id'])
            ->viaTable('order_good', ['order_id' => 'id']);
    }*/

    public function getGoods($orderID)
    {
        return OrderGood::find()->where(['order_id' => $orderID])->all();
    }


    /*public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::class, ['order_id' => 'id']);
    }*/

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['email'], 'email'],
            [['user_id'], 'integer'],
            [['name', 'email', 'phone', 'address', 'status'], 'string', 'max' => 255],
        ];
    }


}
