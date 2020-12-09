<?php


namespace app\widgets;

use app\models\Order;
use app\models\OrderForm;
use app\models\OrderGood;
use Yii;
use yii\base\Widget;

class OrderFormWidget extends Widget
{
    protected function saveOrderGoods($goods, $orderId)
    {

        foreach ($goods as $id => $item) {
            $good = new OrderGood();
            $good->order_id = $orderId;
            $good->product_id = $id;
            $good->name = $item['name'];
            $good->price = $item['price'];
            $good->quantity = $item['quantity'];
            $good->sum = $item['price'] * $item['quantity'];
            $good->save();
        }
    }

    public function run()
    {
        $session = Yii::$app->session;
        $session->open();

        $order = new Order();
        $model = new OrderForm();

        $userID = Yii::$app->user->isGuest ? 0 : Yii::$app->user->identity->getId();

        if ($session['totalPrice'] && $model->load(Yii::$app->request->post()) && $model->validate()) {

            $order->user_id = $userID ;
            $order->name = $model->name;
            $order->email = $model->email;
            $order->phone = $model->phone;
            $order->address = $model->address;
            $order->date = date('Y-m-d H:i:s');
            $order->sum = $session['totalPrice'];
            if ($order->save()) {
                $orderId = $order->id;
                $this->saveOrderGoods($session['cart'], $orderId);
                Yii::$app->mailer->compose('order-mail', ['session' => $session, 'order' => $order, 'model' => $model])
                    ->setFrom(['igor_test_2020@mail.ru' => 'Доставка суши'])
                    ->setTo($model->email)
                    ->setSubject('Заказ получен')
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

