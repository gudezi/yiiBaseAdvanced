<?php

namespace gudezi\croppic;

/**
 * @author Gustavo Dezi
 * @link   <gudezi@gmail.com>
 */

use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\InvalidConfigException;
use yii\widgets\InputWidget;

class Croppic extends InputWidget
{
    const SELECT_SINGLE = 1;
    const CLICK_ACTIVATE = 1;
    
    /**
     * @var string
     */
    public $idPrefix = 'ft_';

    /**
     * HTML atributos de etiqueta div.
     *
     * @var array
     */
    public $options = [];
    /**
     * Opciones de plug-js Croppic, todas las opciones posibles
     * Ver la página web oficial - "http://www.croppic.net/".
     *
     * @var array
     */
    public $pluginOptions = [];
    
    /**
    * @inheritdoc
    */
    public function init()
    {
        // Sino se establece 'id' widget.
        if (!isset($this->options['id'])) {
            // Utilice el ID autogenerado.
            $this->options['id'] = $this->getId();
            $this->options['style'] = 'display:none;';
        }
        // Asignar el 'id' widget.
        $this->id = $this->options['id'];

        // Si la opción 'uploadURL' está vacía.
        if (!isset($this->pluginOptions['uploadUrl']) || empty($this->pluginOptions['uploadUrl'])) {
            throw new InvalidConfigException('Parámetro "uploadURL" no puede estar vacío');
        }
        // Si el parámetro 'cropUrl' está vacía.
        if (!isset($this->pluginOptions['cropUrl']) || empty($this->pluginOptions['cropUrl'])) {
            throw new InvalidConfigException('Parámetro "cropUrl" no puede estar vacío');
        }
        
        $this->pluginOptions['onAfterRemoveCroppedImg'] = 'function(){ milert1(); }';
        $this->pluginOptions['onBeforeImgUpload'] = 'function(){ milert2(); }';
        $this->pluginOptions['onReset'] = 'function(){ milert1(); }';
        $this->pluginOptions['onAfterImgCrop'] = 'function(){ milert3(); }';
    
    //        $this->registerAssets();
        parent::init();
    }
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        //echo Html::tag('input', '');
        //echo Html::input('text', 'txtfotocrop', 'nombre', ['class' => 'form-control']);
        $name = $this->hasModel() ? Html::getInputName($this->model, $this->attribute) : $this->name;

        $id = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
        
        $this->pluginOptions['outputUrlId']=$id;
        $this->pluginOptions['customUploadButtonId']='mibot';
        
        //$this->pluginOptions['modal']=true;
        //$this->pluginOptions['processInline']=true;
        
        //$this->pluginOptions['onAfterImgCrop'] = "function(){ console.log('onAfterImgCrop') }";
        //$this->pluginOptions['onAfterImgCrop'] = "alert('1')";
        
        $attribute = $this->attribute;
        $value=$this->model->$attribute;

        /*echo "<pre>";print_r($this->model->$attribute);
        //((print_r("\"{$name}\"");
        //print_r($this->model->$idfield);
        die;*/
        echo Html::Input('text', $name, $value, ['class' => 'form-control', 'id' => $id]);
        echo Html::Input('hidden', 'hival', $value, ['class' => 'form-control', 'id' => 'hival']);
        //echo Html::button('Press me!', ['class' => 'cropControlUpload', 'id' => 'miboton'] );
        
        //echo '<div class="cropControls cropControlsUpload" id="boti" style="top: 32px;left: 374px;position: relative;width: 30px;" > <i class="cropControlUpload" id="mibot"></i> </div>';
        
        echo '<div class="croppic" id="loadimg" style="background-image: url(/yiiBaseAdvanced/backend/web/img/user/avatar/i-1478197077581b7f5578710.jpg);">';
        echo '<div class="cropControls cropControlsUpload" id="boti" > <i class="cropControlUpload mibot" id="mibot"></i> </div>';
        echo '</div>';
        
        
        //type, model, model attribute name, options
        //echo Html::Input('text', $this->model, $name, ['class' => 'form-control']);
        
        echo Html::tag('div', '', $this->options);
/*        if($value!='')
        {
            
        }*/
        
        $this->registerClientScript();
    }

    /**
     * Registra css y js en una página.
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        CroppicAsset::register($view);

        $pluginOptions = Json::encode($this->pluginOptions);
  //      $pluginOptions = str_replace('"onBeforeImgUpload"','onBeforeImgUpload',$pluginOptions);
        $pluginOptions = str_replace('"function(){ milert1(); }"','function(){ milert1(); }',$pluginOptions);
        $pluginOptions = str_replace('"function(){ milert2(); }"','function(){ milert2(); }',$pluginOptions);
        $pluginOptions = str_replace('"function(){ milert3(); }"','function(){ milert3(); }',$pluginOptions);
//        print_r($pluginOptions);
//        die;
        $id = $this->id;
        $idtext = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
        
        $js='function milert1(){ $("#loadimg").show();
        $("#boti").show();
        $("#w1").hide();
        ant = ("#hival").val();
        $("#'.$idtext.'").val(ant);
        }';
        $view->registerJs($js);

        $js='function milert2(){ $("#loadimg").hide();
        $("#boti").hide();
        $("#w1").show();}';
        $view->registerJs($js);
        
        $js='function milert3(){ 
        str = $("#'.$idtext.'").val();
        res = str.replace("..", ""); 
        $("#'.$idtext.'").val(res);
        }';
        $view->registerJs($js);
        
        $js = "var {$this->id} = new Croppic('{$this->id}', {$pluginOptions});";
       
        $view->registerJs($js);
        
        //$js="function onAfterImgCrop(){ console.log('onAfterImgCrop') }";
        $view->registerJs($js);
        //$view->registerJs('$("#'.$this->id.'").onAfterImgCrop(function(event){ $("#'.$idtext.'").val("probando");});');
/*        $view->registerJs('$("#mibot").click(function(event){ 
        $("#loadimg").hide();
        $("#boti").hide();
        $("#w1").show();});');*/
        
        //$view->registerJs('$("#'.$id.'").change(function(event){event.preventDefault(); $("#'.$id.'").val("probando");});');

    }
}