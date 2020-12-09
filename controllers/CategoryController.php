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
        $catNames = Category::find()->select('cat_name')->column();
        $search = Yii::$app->request->get('search');
        if ($catName && !in_array($catName, $catNames) && !$search) {
            throw new NotFoundHttpException('Категория не существует');
        }
        if ($search) {
            $goods = $model->getSearchResults($search);
        }

        return $this->render('index', compact('goods', 'search', 'session'));
    }

}
