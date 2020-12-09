<?php


namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class AdminBehaviorsController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'view', 'update', 'delete', 'error'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->is_admin;
                        }
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index', 'create', 'view', 'update', 'delete', 'error'],
                        'roles' => ['?', '@'],
                        'denyCallback' => function () {
                            throw new HttpException(403, 'Доступ запрещен');
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['post', 'get'],
                    'create' => ['post', 'get'],
                    'view' => ['post', 'get'],
                    'update' => ['post', 'get'],
                    'delete' => ['post', 'get'],
                ],
            ],
        ];
    }
}
