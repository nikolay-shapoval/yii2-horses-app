<?php

namespace app\controllers;

use app\models\Breeds;
use app\models\Owners;
use Yii;
use app\models\Horses;
use app\models\HorsesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HorsesController implements the CRUD actions for Horses model.
 */
class HorsesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Horses models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new HorsesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $sexs         = Horses::getSexs();

        return $this->render(
            'index',
            [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
                'sexs'         => $sexs,
            ]
        );
    }

    /**
     * Creates a new Horses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Horses();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $data['sexs']   = Horses::getSexs();
            $data['owners'] = Owners::getOwnersList();
            $data['breeds'] = Breeds::getBreedsList();

            return $this->render(
                'create',
                [
                    'model' => $model,
                    'data'  => $data,
                ]
            );
        }
    }

    /**
     * Updates an existing Horses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $data['sexs']   = Horses::getSexs();
            $data['owners'] = Owners::getOwnersList();
            $data['breeds'] = Breeds::getBreedsList();

            return $this->render(
                'update',
                [
                    'model' => $model,
                    'data'  => $data,
                ]
            );
        }
    }

    /**
     * Deletes an existing Horses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Horses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Horses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Horses::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
