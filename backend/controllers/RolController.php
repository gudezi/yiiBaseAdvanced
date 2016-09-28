<?php

namespace backend\controllers;

use Yii;
use backend\models\Rol;
use backend\models\search\RolSearch;
use backend\models\Operacion;
use backend\models\Usuario;
use common\models\Menu;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * RolController implements the CRUD actions for Rol model.
 */
class RolController extends BaseController //Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'create', 'update', 'delete', 'usuario', 'menu'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Rol models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rol model.
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
     * Creates a new Rol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rol();
        $listaOpciones = Operacion::find()->all();
     
        if ($model->load(Yii::$app->request->post())){
            if (!isset($_POST['Rol']['operaciones'])){
                $model->operaciones = [];
            }
            //echo "<Pre>";print_r($_POST);die;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'listaOpciones' => $listaOpciones,
            ]);
        }
        /*$model = new Rol();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing Rol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $listaOpciones = Operacion::find()->all();

        $model->operaciones = \yii\helpers\ArrayHelper::getColumn(
            $model->getRolOperaciones()->asArray()->all(),
            'operacion_id'
        );
    
        if ($model->load(Yii::$app->request->post())) {
            if (!isset($_POST['Rol']['operaciones'])) {
                $model->operaciones = [];
            }
            //echo "<Pre>";print_r($_POST);die;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'listaOpciones' => $listaOpciones,
            ]);
        }
    /*  $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Deletes an existing Rol model.
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
     * Finds the Rol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rol::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionUsuario($id)
    {
        $model = $this->findModel($id);
        $listaOpciones = Usuario::find()->all();
        $model->usuarios = \yii\helpers\ArrayHelper::getColumn(
            $model->getRolUsuarios()->asArray()->all(),
            'usuario_id'
        );
        //echo "<pre>";print_r($model->usuarios);print_r($listaOpciones);die;
    
        if ($model->load(Yii::$app->request->post())) {
            if (!isset($_POST['Rol']['usuarios'])) {
                $model->usuarios = [];
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('usuario', [
                'model' => $model,
                'listaOpciones' => $listaOpciones,
            ]);
        }
    }
    
    public function actionMenu($id)
    {
        $model = $this->findModel($id);
        //$listaOpciones = Menu::find()->all();
        $listaOpciones = Menu::getTreeCheck();
        $model->menues = \yii\helpers\ArrayHelper::getColumn(
            $model->getRolMenues()->asArray()->all(),
            'menu_id'
        );
        //echo "<pre>";print_r($model->usuarios);print_r($listaOpciones);die;
    
        if ($model->load(Yii::$app->request->post())) {
            if (!isset($_POST['Rol']['menues'])) {
                $model->menues = [];
            }
            //echo "<Pre>";print_r($_POST);die;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('menu', [
                'model' => $model,
                'listaOpciones' => $listaOpciones,
            ]);
        }

    }
}
