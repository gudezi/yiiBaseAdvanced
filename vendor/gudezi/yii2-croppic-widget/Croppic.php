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
     * Ver la p�gina web oficial - "http://www.croppic.net/".
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
        }
        // Asignar el 'id' widget.
        $this->id = $this->options['id'];

        // Si la opci�n 'uploadURL' est� vac�a.
        if (!isset($this->pluginOptions['uploadUrl']) || empty($this->pluginOptions['uploadUrl'])) {
            throw new InvalidConfigException('Par�metro "uploadURL" no puede estar vac�o');
        }
        // Si el par�metro 'cropUrl' est� vac�a.
        if (!isset($this->pluginOptions['cropUrl']) || empty($this->pluginOptions['cropUrl'])) {
            throw new InvalidConfigException('Par�metro "cropUrl" no puede estar vac�o');
        }
    //        $this->registerAssets();
        parent::init();
    }
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::tag('input', '');
        echo Html::tag('div', '', $this->options);
        
        $this->registerClientScript();
    }

    /**
     * Registra css y js en una p�gina.
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        CroppicAsset::register($view);

        $pluginOptions = Json::encode($this->pluginOptions);
        $js = "var {$this->id} = new Croppic('{$this->id}', {$pluginOptions});";

        $view->registerJs($js);
    }
}