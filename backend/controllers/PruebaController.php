<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
//use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
//use yii\helpers\ArrayHelper;*/
use common\models\Prueba;


//use org\bovigo\vfs\vfsStream;
//use tests\codeception\unit\TestCase;
use gudezi\croppic\actions\CropAction;
use gudezi\croppic\actions\UploadAction;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class PruebaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'upload' => ['post'],
                    'crop' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'upload' => [
                'class' => 'gudezi\croppic\actions\UploadAction',
                'tempPath' => '@backend/web/img/temp',
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
                'path' => '@backend/web/img/user/avatar',
                'url' => 'img/user/avatar/',
                'modelAttribute' => 'urlUpload',
                //'modelScenario' => 'saveAvatar',
                //'permissionRBAC' => 'updateProfile',
                //'parameterRBAC' => 'profile',
            ],
        ];
    }

    /*public function beforeAction($action)
    {
        if ($action->id === 'upload' || $action->id === 'crop') {
            //$action->model = new Prueba();
            if ($action->hasProperty('model')) {
                $action->model = $this->findModel(Yii::$app->request->get('id'));
            }
        }

        if (!parent::beforeAction($action)) {
            //die("paso2");
            return false;
        }
        return true;
    }*/
    
    /*public function actionUpload()
    {
        //print_r($_POST);
        //die;
    }*/
    
    public function actionIndex()
    {
        //$searchModel = new UsuarioSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //print_r(Yii::$app->request->post());
        $model = new Prueba();

        $this->layout = false;
        //die;
        if ($model->load(Yii::$app->request->post()))
        {
            echo "<pre>";
            print_r($model->urlUpload);
            die;
        }
        else
        {
            $model->urlUpload = 'img/user/avatar/i-14768128925806605c543c7.jpg';
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}
