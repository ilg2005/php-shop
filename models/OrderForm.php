<?php


namespace app\models;


use yii\base\Model;

class OrderForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $address;

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }
}
