<?php

namespace backend\controllers;

use Yii;
use backend\models\Usuario;
//use common\models\User;
use backend\models\Rol;
use backend\models\Operacion;
use backend\models\RolOperacion;
use backend\models\search\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
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
     * Deletes an existing Usuario model.
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
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionProfile($id)
    {
        $model = $this->findModel($id);
        if($model->Profile)
            return $this->redirect('../profile/update?id='.$id);
        else
            return $this->redirect('../profile/create?id='.$id);
    }
    
    public function actionRol($id)
    {
        $model = $this->findModel($id);
        $listaOpciones = Rol::find()->all();
        $model->roles = \yii\helpers\ArrayHelper::getColumn(
            $model->getRolUsuarios()->asArray()->all(),
            'rol_id'
        );
        //echo "<pre>";print_r($model->roles);print_r($listaOpciones);die;
        if ($model->load(Yii::$app->request->post())) {
            if (!isset($_POST['Usuario']['roles'])) {
                $model->roles = [];
            }
            //echo "<pre>";print_r($model); die;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('rol', [
                'model' => $model,
                'listaOpciones' => $listaOpciones,
            ]);
        }
    }
    
    public function actionPermiso($id)
    {
        $model = $this->findModel($id);

        $rolarray[0]=0;
        foreach($model->rolesPermitidos as $roles)
            $rolarray[]=$roles->id;
        
        $rows = (new \yii\db\Query())
            ->select(['operacion_id'])
            ->distinct(true)
            ->from('rol_operacion')
            ->where(['rol_id' => $rolarray])
            ->all();

        $operacionarray[]=0;
        foreach($rows as $row)
            $operacionarray[] = $row['operacion_id'];

        $listaOpciones = Operacion::find()->where(['id'=> $operacionarray])->all();
        
        $model->permisos = \yii\helpers\ArrayHelper::getColumn(
            $model->getUsuarioOperacion()->asArray()->all(),
            'operacion_id'
        );
        if ($model->load(Yii::$app->request->post())) {
            if (!isset($_POST['Usuario']['permisos'])) {
                $model->permisos = [];
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('permiso', [
                'model' => $model,
                'listaOpciones' => $listaOpciones,
            ]);
        }
    }
}
