<?php
namespace app\models;

use yii\base\Model;


class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;

    public function rules()
    {
        return [

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Этот электронный адрес уже используется'],

            ['username', 'trim'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'string', 'min' => 8, 'tooShort' => 'Пароль должен быть не менее 8 символов'],


            [['email', 'username', 'password'], 'required', 'message' => 'Это поле должно быть заполнено!'],
        ];
    }

}
