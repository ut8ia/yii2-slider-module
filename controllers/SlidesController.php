<?php

namespace ut8ia\slidermodule\controllers;

use Yii;
use ut8ia\slidermodule\models\Slides;
use ut8ia\slidermodule\models\Sliders;
use ut8ia\slidermodule\models\SlidesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SlidesController implements the CRUD actions for Slides model.
 */
class SlidesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Slides models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlidesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'layout' => '@app/backend/views/layouts/main'
        ]);
    }

    /**
     * Displays a single Slides model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slides model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($slider_id)
    {
        $model = new Slides();
        //check that slider exist
        if (Sliders::findOne($slider_id)) {
            //load model
            $load_mark = $model->load(Yii::$app->request->post());
            // inject slider_id
            $model->slider_id = $slider_id;
            if ($load_mark && $model->save()) {
                return $this->redirect(['sliders/update', 'id' => $model->slider_id]);
            }
        }
        return $this->render('create', ['model' => $model]);

    }

    /**
     * Updates an existing Slides model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['sliders/update', 'id' => $model->slider_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Slides model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $slider_id = $model->slider_id;
        $model->delete();
        return $this->redirect(['sliders/update', 'id' => $slider_id]);
    }

    /**
     * Finds the Slides model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slides the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slides::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
