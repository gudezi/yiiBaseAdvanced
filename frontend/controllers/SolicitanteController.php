<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Solicitante;
use frontend\models\search\SolicitanteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * SolicitanteController implements the CRUD actions for Solicitante model.
 */
class SolicitanteController extends Controller
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
     * Lists all Solicitante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SolicitanteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Solicitante model.
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
     * Creates a new Solicitante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($submit = false)
    {
       
/*        $model = new Solicitante();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
        
        $model = new Solicitante();
 
       if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
           Yii::$app->response->format = Response::FORMAT_JSON;
           return ActiveForm::validate($model);
       }
    
       if ($model->load(Yii::$app->request->post())) {
           if ($model->save()) {
               $model->refresh();
               Yii::$app->response->format = Response::FORMAT_JSON;
               return [
                   'message' => '¡Éxito!',
               ];
           } else {
               Yii::$app->response->format = Response::FORMAT_JSON;
               return ActiveForm::validate($model);
         }
       }
    
       return $this->renderAjax('create', [
           'model' => $model,
       ]);
    }

    /**
     * Updates an existing Solicitante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $submit = false)
    {
        $model = $this->findModel($id);
    
       if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
           Yii::$app->response->format = Response::FORMAT_JSON;
           return ActiveForm::validate($model);
       }  
    
       if ($model->load(Yii::$app->request->post())) {
           if ($model->save()) {
               $model->refresh();
               Yii::$app->response->format = Response::FORMAT_JSON;
               return [
                   'message' => '¡Éxito!',
               ];
           } else {
               Yii::$app->response->format = Response::FORMAT_JSON;
               return ActiveForm::validate($model);
           }
       }
    
       return $this->renderAjax('update', [
           'model' => $model,
       ]);      /*     
         $model = $this->findModel($id);

              if ($model->load(Yii::$app->request->post()) && $model->save()) {
                  return $this->redirect(['view', 'id' => $model->id]);
              } else {
                  return $this->render('update', [
                      'model' => $model,
                  ]);
              }*/
    }

    /**
     * Deletes an existing Solicitante model.
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
     * Finds the Solicitante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Solicitante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Solicitante::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionGustavo()
    {
        return $this->render('gustavo');
    }
}
