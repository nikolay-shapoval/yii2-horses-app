<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;

class MainController extends Controller
{

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'dialogs' => [
                'class' => 'app\components\TopAction',
            ],

        ];
    }

    /**
     * Main page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
