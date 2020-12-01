<?php


namespace app\controllers;


use app\models\Category;
use app\models\Good;
use app\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
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

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}
