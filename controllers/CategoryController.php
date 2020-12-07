<?php


namespace app\controllers;


use app\models\Good;
use app\models\Order;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionIndex($catName = '')
    {
        $session = Yii::$app->session;
        $session->open();
        $model = new Good();
        $goods = $model->getAllGoods();
        $search = Yii::$app->request->get('search');
        if ($catName) {
            $goods = $model->getGoodsByCategory($catName);
        }
        if ($search) {
            $goods = $model->getSearchResults($search);
        }

        return $this->render('index', compact('goods', 'search', 'session'));
    }

}
