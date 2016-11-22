<?php

namespace backend\controllers;

use Yii;
use backend\models\Fotos;
use backend\models\FotosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * FotosController implements the CRUD actions for Fotos model.
 */
class FotosController extends BaseController
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
     * Lists all Fotos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FotosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fotos model.
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
     * Creates a new Fotos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fotos();
        if ($model->load(Yii::$app->request->post()))
        {
            if($model->save()) 
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Fotos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Fotos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fotos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fotos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fotos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*public function actions()
    {
        return [
            'upload' => [
                'class' => 'gudezi\croppic\actions\UploadAction',
                'tempPath' => '@backend/web/fotos/img/temp',
                'tempUrl' => 'img/temp/',
                'validatorOptions' => [
                    'checkExtensionByMimeType' => true,
                    'extensions' => 'jpeg, jpg, png',
                    'maxSize' => 3000000,
                    'tooBig' => 'Ha seleccionado una imagen demasiado grande (máx. 3 MB)',
                ],
                //'permissionRBAC' => 'updateProfile',
                //'parameterRBAC' => 'profile'
            ],
            'crop' => [
                'class' => 'gudezi\croppic\actions\CropAction',
                'path' => '@backend/web/fotos/img/user/avatar',
                'url' => 'img/user/avatar/',
                'modelAttribute' => 'urlUpload',
                //'modelScenario' => 'saveAvatar',
                //'permissionRBAC' => 'updateProfile',
                //'parameterRBAC' => 'profile',
            ],
        ];
    }*/
}
