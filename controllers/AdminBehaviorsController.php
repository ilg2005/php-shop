<?php


namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

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
                        'actions' => ['index', 'create', 'view', 'update', 'delete'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->is_admin;
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
