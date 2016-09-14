<?php


namespace frontend\controllers;

use yii\web\Controller;
use common\models\HtmlHelpers;
use frontend\models\Departamentos;
use frontend\models\Localidades;

class DependentDropdownController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionDepartamento($id){
        echo HtmlHelpers::dropDownList(Departamentos::className(), 'provincia_id', $id, 'id', 'descripcion');
    }

    public function actionLocalidad($id){
        echo HtmlHelpers::dropDownList(Localidades::className(), 'departamento_id', $id, 'id', 'descripcion');
    }
}
?>