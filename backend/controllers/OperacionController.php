<?php

namespace backend\controllers;

use Yii;
use backend\models\Operacion;
use backend\models\search\OperacionSearch;
use common\models\AccessHelpers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * OperacionController implements the CRUD actions for Operacion model.
 */
class OperacionController extends BaseController //Controller
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
                        'actions' => ['logout', 'index', 'view', 'create', 'update', 'delete', 'generate'],
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
     * Lists all Operacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OperacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Operacion model.
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
     * Creates a new Operacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Operacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Operacion model.
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
     * Deletes an existing Operacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    private function toUrlAction($cadena)
    {
        $retorno = '';
        for($i=0;$i<strlen($cadena);$i++)
        { 
            $letra=$cadena{$i};
            if(ctype_upper($letra) && $i>1)
            {
                $retorno .= '-'.strtolower($letra);
            }
            else
            {
                $retorno .= strtolower($letra);
            }
        }  
        return $retorno;
    }
    
    /**
     * Generate new Operacion model from controllers actions.
     * @return mixed
     */
    public function actionGenerate()
    {
        $model = new Operacion();
        
        $operaciones=Operacion::find()->all();
        $operaciones=ArrayHelper::map($operaciones, 'nombre', 'nombre');
        $accionesresult = array();
        $controladores = $this->getControllersAndActions();

        if(count($controladores)>0)
        {
            foreach($controladores as $key => $controlador)
            {
                $key = str_replace('Controller','',$key);
                if(count($controlador)>0)
                {
                    foreach($controlador as $accion)
                    {
                        $dato = $this->toUrlAction($key).'-'.$this->toUrlAction($accion);
                        $accionesresult[] = $dato;
                    }
                }
            }
        }
        $acciones = array();
        foreach ($accionesresult as $accion)
        {
            if(!in_array($accion,$operaciones) && !in_array($accion,AccessHelpers::getPermitidas()))    
            {
                $acciones[$accion]=$accion;
            }
        }
        if ($model->load(Yii::$app->request->post())) 
        {
            if (!isset($_POST['Operacion']['operaciones'])) {
                $model->operaciones = [];
            }
            //echo "<pre>";print_r($model->operaciones);die;
            if ($model->generate()) {
                return $this->redirect(['index']);
            }
        }
        else 
        {
            return $this->render('generate', [
                'model' => $model,
                'acciones' => $acciones,
            ]);
        }
        
        
        /*$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Finds the Operacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Operacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Operacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getControllersAndActions()
    {
        $rutamodulos = '../../frontend/modules';
        $rutacontrollers = '../../frontend/controllers';
        
        $controllers = $this->getControllersAndActionsbyRute($rutacontrollers);
        if ($handle = opendir($rutamodulos)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    $modulos = $this->getControllersAndActionsbyRute($rutamodulos.'/'.$file.'/controllers');
                    $name = ucwords($file);
                    if(count($modulos)>0)
                    {
                        foreach($modulos as $key => $value)
                        {
                            $controllers[$name.$key]=$value;
                        }
                    }
                }
            }
            closedir($handle);
        }
        return $controllers;
    }
    
    protected function getControllersAndActionsbyRute($ruta)
    {
        //$ruta='../../frontend/controllers';
        $controllerlist = [];
        if ($handle = opendir($ruta)) {
            while (false !== ($file = readdir($handle))) {
                //if ($file != "." && $file != ".." && substr($file, strrpos($file, '.') - 10) == 'Controller.php') {
                if ($file != "." && $file != ".." && substr($file, strrpos($file, '.') - 10) == 'Controller.php' && substr($file, 0, 9) != 'Dependent' && substr($file, 0, 7) != 'Default') {
                    
                    $controllerlist[] = $file;
                }
            }
            closedir($handle);
        }
        asort($controllerlist);
        $fulllist = [];
        foreach ($controllerlist as $controller):
            $handle = fopen($ruta . '/' . $controller, "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    if (preg_match('/public function action(.*?)\(/', $line, $display)):
                        if (strlen($display[1]) > 2):
                            //$fulllist[substr($controller, 0, -4)][] = strtolower($display[1]);
                            $fulllist[substr($controller, 0, -4)][] = $display[1];
                        endif;
                    endif;
                }
            }
            fclose($handle);
        endforeach;
        return $fulllist;
    }

}
