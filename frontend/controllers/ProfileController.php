<?php

namespace frontend\controllers;


use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use common\models\Book;
use common\models\Library;


class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'update-address', 'update-account'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        /** @var \common\models\User $user */
        $user = Yii::$app->user->identity;
        $id = $user->id;
        $bookc  = Book::find()->userid($id)->count();
        $dataProvider = new ActiveDataProvider([
            'query' => Book::find()->userid($id),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'user' =>  $user,
            'bookc' =>  $bookc,
            'dataProvider' => $dataProvider
        ]);
    }
}