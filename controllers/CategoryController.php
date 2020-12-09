<?php


namespace app\controllers;


use app\models\Category;
use app\models\Good;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
        $catNames = Category::find()->select('cat_name')->column();
        if ($catName && !in_array($catName, $catNames)) {
            throw new NotFoundHttpException('Категория не существует');
        }
        return $this->render('index', compact('goods', 'search', 'session'));
    }

}
