<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use gudezi\croppic\actions\CropAction;
use gudezi\croppic\actions\UploadAction;

class UploadCropController extends Controller
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
                'tempUrl' => '../img/temp/',
                'validatorOptions' => [
                    'checkExtensionByMimeType' => true,
                    'extensions' => 'jpeg, jpg, png',
                    'maxSize' => 3000000,
                    'tooBig' => 'Ha seleccionado una imagen demasiado grande (máx. 3 MB)',
                ],
            ],
            'crop' => [
                'class' => 'gudezi\croppic\actions\CropAction',
                'path' => '@backend/web/img/user/avatar',
                'url' => '../img/user/avatar/',
                'modelAttribute' => 'urlUpload',
            ],
        ];
    }
}
