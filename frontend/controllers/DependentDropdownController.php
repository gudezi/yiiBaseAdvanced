<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\HtmlHelpers;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use frontend\models\Partidos;
use frontend\models\Localidades;

class DependentDropdownController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionPartido($id){
        echo HtmlHelpers::dropDownList(Partidos::className(), 'provincia_id', $id, 'id', 'descripcion', 'Por favor elija uno');
    }

    /*public function actionPartido(){
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
		//echo "<pre>";print_r($_POST);
        if ($parents != null) {
            $provincia_id = $parents[0];
            
            $partidos = Partidos::findAll(['provincia_id' => $provincia_id]);
            
            $out = ArrayHelper::toArray($partidos, [
            'frontend\models\Partidos' => [
            'id', 'name' => 'descripcion'],
            ]);
            //$out = self::getSubCatList($provincia_id); 
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);    }*/

    public function actionLocalidad($id){
        echo HtmlHelpers::dropDownList(Localidades::className(), 'partido_id', $id, 'id', 'descripcion','Por favor elija una');
    }
    
    /*public function actionLocalidad(){
    $out = [];
	//d($_POST);
	//echo "<pre>";print_r($_POST);
    if (isset($_POST['depdrop_parents'])) {
        $ids = $_POST['depdrop_parents'];
		//echo "<pre>";print_r($_POST);
        $provincia_id = empty($ids[0]) ? null : $ids[0];
        $partido_id = empty($ids[1]) ? null : $ids[1];
        if ($provincia_id != null) {
            $localidades = Localidades::findAll(['partido_id' => $partido_id]);
            $out = ArrayHelper::toArray($localidades, [
            'frontend\models\Localidades' => [
            'id', 'name' => 'descripcion'],
            ]);
            //print_r($localidades);
            
            $data['out']=$out;
            $data['selected']='342';
           //$data = self::getProdList($provincia_id, $partido_id);
            /**
             * the getProdList function will query the database based on the
             * cat_id and sub_cat_id and return an array like below:
             *  [
             *      'out'=>[
             *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
             *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
             *       ],
             *       'selected'=>'<prod-id-1>'
             *  ]
             */
           
           /*echo Json::encode(['output'=>$data['out'], 'selected'=>$data['selected']]);
           return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
    }*/
    
}
?>