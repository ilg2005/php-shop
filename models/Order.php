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


    public function rules()
    {
        return [
            [['date', 'name', 'email', 'phone', 'address', 'sum'], 'required'],
            [['date'], 'safe'],
            [['email'], 'email'],
            [['sum'], 'integer'],
            [['status'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

       public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'sum' => 'Сумма',
            'status' => 'Статус',
        ];
    }
}
