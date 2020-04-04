<?php

namespace app\controllers;

use app\models\AddProductForm;
use app\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\debug\models\timeline\DataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    //public function behaviors()
    //{
    //    return [
    //        'access' => [
    //            'class' => AccessControl::className(),
    //            'only' => ['logout'],
    //            'rules' => [
    //                [
    //                    'actions' => ['logout'],
    //                    'allow' => true,
    //                    'roles' => ['@'],
    //                ],
    //            ],
    //        ],
    //        'verbs' => [
    //            'class' => VerbFilter::className(),
    //            'actions' => [
    //                'logout' => ['post'],
    //            ],
    //        ],
    //    ];
    //}

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


}
