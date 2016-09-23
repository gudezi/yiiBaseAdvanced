<?php

namespace backend\controllers;

use backend \models\PhotoModel;
use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;

class CropController extends Controller
{
	public function actionIndex()
	{
		try
		{
			PhotoModel::getTableSchema();
		}
		catch (Exception $e)
		{
			//$this->redirect(Url::to('/crop/install'));
			//$this->redirect(Url::to('/crop'));
            $this->redirect(['install']);
		}


		$query = PhotoModel::find();

		$dataProvider = new ActiveDataProvider(['query' => $query]);
		$dataProvider->setSort(false);

		$data['grid_config'] = ['dataProvider' => $dataProvider];

		$model = new PhotoModel();
		$grid_config = [
			'dataProvider' => $dataProvider,
			'columns' => $model->attributes(),
		];

		$grid_config['columns'][] = [
			'format' => 'raw',
			'value' => function ($model, $key, $index, $column) { return Html::a('edit', Url::to('../crop/edit?id=' . $model->id)); } ,
		];
		return $this->render('index', ['grid_config' => $grid_config]);
	}

	public function actionEdit($id = null)
	{
		if ($id) {
			$model = PhotoModel::findOne($id);
			$model->scenario = 'update';
		} else {
			$model = new PhotoModel();
			$model->scenario = 'insert';
		}

		if ($model->load(Yii::$app->request->post())) {
			$model->save();
			//$this->redirect(Url::to('/crop'));
            $this->redirect(['index']);
		}

		$data = ['model' => $model];
		return $this->render('edit', $data);
	}

	public function actionInstall()
	{
		$db_request = '
CREATE TABLE `photo` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`photo` VARCHAR(100) NOT NULL,
	`photo_crop` VARCHAR(100) NOT NULL,
	`photo_cropped` VARCHAR(100) NOT NULL,
	`title` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
;
		';

		if (isset($_GET['go'])) {
			Yii::$app->db->createCommand($db_request)->query();
			//$this->redirect(Url::to('/crop'));
            $this->redirect(['index']);
		}

		return $this->render('install', ['request' => $db_request]);
	}
}
