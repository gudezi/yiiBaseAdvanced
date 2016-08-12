<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 22/02/2015
 * Time: 11:59 AM
 */

namespace common\models;


class HtmlHelpers {

    public static function dropDownList($model, $parent_model_id, $id, $value, $string)
    {
        $rows = $model::find()->where([$parent_model_id => $id])->all();

        $droptions = "<option>Please Choose One</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                $droptions .= '<option value='.$row->$value.'>'.$row->$string.'</option>';
            }
        }
        else{
            $droptions .= "<option>No results found</option>";
        }

        return $droptions;
    }

}
?>