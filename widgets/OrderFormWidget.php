<?php


namespace app\widgets;

use app\models\Order;
use app\models\OrderForm;
use Yii;
use yii\base\Widget;

class OrderFormWidget extends Widget
{

    public function run()
    {
        $session = Yii::$app->session;
        $session->open();

        $order = new Order();
        $model = new OrderForm();

        if ($session['totalPrice'] && $model->load(Yii::$app->request->post()) && $model->validate()) {
            $order->name = $model->name;
            $order->email = $model->email;
            $order->phone = $model->phone;
            $order->address = $model->address;
            $order->date = date('Y-m-d H:i:s');
            $order->sum = $session['totalPrice'];
            if ($order->save()) {
                Yii::$app->mailer->compose('order-mail', ['session' => $session, 'order' => $order, 'model' => $model])
                    ->setFrom(['igor_test_2020@mail.ru' => 'Доставка суши'])
                    ->setTo($model->email)
                    ->setSubject('Заказ суши получен')
                    ->send();

                $session->remove('cart');
                $session->remove('totalQuantity');
                $session->remove('totalPrice');

                Yii::$app->session->setFlash('contactFormSubmitted');
            }

        }
        return $this->render('orderForm', compact('model', 'order'));
    }

}

