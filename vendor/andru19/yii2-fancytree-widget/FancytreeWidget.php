<?php


namespace andru19\fancytree;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * The yii2-fancytree-widget is a Yii 2 wrapper for the fancytree.js
 * See more: https://github.com/mar10/fancytree
 *

 */
class FancytreeWidget extends InputWidget
{
    const SELECT_SINGLE = 1;
    const SELECT_MULTI = 2;
    const SELECT_MULTI_HIER = 3;

    const CLICK_ACTIVATE = 1;
    const CLICK_EXPAND = 2;
    const CLICK_ACTIVATE_EXPAND = 3;
    const CLICK_DBL_EXPAND = 4;

    /**
     * @var bool Make sure that the active node is always visible, i.e. its parents are expanded
     */
    public $activeVisible = true;
    /**
     * @var array Default options for ajax requests
     */
    public $ajax = [];
    /**
     * @var bool Add WAI-ARIA attributes to markup
     */
    public $aria = false;
    /**
     * @var bool Activate a node when focused with the keyboard
     */
    public $autoActivate = true;
    /**
     * @var bool Automatically collapse all siblings, when a node is expanded
     */
    public $autoCollapse = false;
    /**
     * @var bool Scroll node into visible area, when focused by keyboard
     */
    public $autoScroll = false;
    /**
     * @var bool Display checkboxes to allow selection
     */
    public $checkbox = false;
     
    /**
     * @var bool Defines if quick search activated
     */
    public $quicksearch = false;
    
    /**
     * @var int Defines what happens, when the user click a folder node. 1:activate, 2:expand, 3:activate and expand, 4:activate/dblclick expands
     */
    public $clickFolderMode = self::CLICK_DBL_EXPAND;
    /**
     * @var null|int 0..2 (null: use global setting $.ui.fancytree.debugInfo)
     */
    public $debugLevel = null;
    /**
     * @var null|string|JsExpression callback(node) is called for ner nodes without a key. Must return a new unique key. (default null: generates default keys like that: "_" + counter)
     */
    public $defaultKey = null;
    /**
     * @var bool Accept passing ajax data in a property named `d`
     */
    public $enableAspx = true;
    /**
     * @var array List of active extensions
     */
    public $extensions = [];
    /**
     * @var array Animation options, null:off Gutavo ex fx
     */
    public $toggleEffect = ['height' => 'toggle', 'duration' => 200];
    /**
     * @var bool Add `id="..."` to node markup
     */
    public $generateIds = true;
    /**
     * @var bool Display node icons gustavo ex icons
     */
    public $icon = true;
    /**
     * @var string
     */
    public $idPrefix = 'ft_';
    /**
     * @var string|null Path to a folder containing icons (default: null, using 'skin/' subdirectory)
     */
    public $imagePath = null;
    /**
     * @var bool Support keyboard navigation
     */
    public $keyboard = true;
    /**
     * @var string
     */
    public $keyPathSeparator = '/';
    /**
     * @var int 2: top-level nodes are not collapsible
     */
    public $minExpandLevel = 1;
    /**
     * @var array optional margins for node.scrollIntoView()
     */
    public $scrollOfs = ['top' => 0, 'bottom' => 0];
    /**
     * @var string jQuery scrollable container for node.scrollIntoView()
     */
    public $scrollParent = '$container';
    /**
     * @var int 1:single, 2:multi, 3:multi-hier
     */
    public $selectMode = self::SELECT_MULTI;
    /**
     * @var array Used to Initialize the tree
     */
    public $source;
    /**
     * @var id of parent category (optional)
     */
    public $parent;
    /**
     * @var id field table
     */
    public $idfield = 'id';
    /**
     * @var array Translation table
     */
    public $strings;
    /**
     * @var bool Add tabindex='0' to container, so tree can be reached using TAB Gustavo ex tabbable
     */
    public $tabindex = 0;
    /**
     * @var bool Add tabindex='0' to node title span, so it can receive keyboard focus
     */
    public $titlesTabbable = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->registerAssets();
        parent::init();
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        echo "<div>";
		if (isset($this->options['isexpand'])) {
            if($this->options['isexpand']){
				echo "<button id='".$idPrefix."ExpandAll' class='btn btn-xs btn-primary'>Expand All</button>";
			}
		}
		if (isset($this->options['iscollapse'])) {
            if($this->options['iscollapse']){
				echo "<button id='".$idPrefix."CollapseAll' class='btn btn-xs btn-warning'>Collapse All</button>";
			}
		}
		if (isset($this->options['istoggleexpand'])) {
            if($this->options['istoggleexpand']){
				echo "<button id='".$idPrefix."ToggleExpand' class='btn btn-xs btn-info'>Toggle Expand</button>";
			}
		}
		if (isset($this->options['issetall']) && $this->selectMode == self::SELECT_MULTI) {
            if($this->options['issetall']){
				echo "<button id='".$idPrefix."SetAll' class='btn btn-xs btn-primary'>Select All</button>";
			}
		}
		if (isset($this->options['isunsetall']) && $this->selectMode == self::SELECT_MULTI) {
            if($this->options['isunsetall']){
				echo "<button id='".$idPrefix."UnsetAll' class='btn btn-xs btn-warning'>Unselect All</button>";
			}
		}
		if (isset($this->options['istoggleselect']) && $this->selectMode == self::SELECT_MULTI) {
            if($this->options['istoggleselect']){
				echo "<button id='".$idPrefix."ToggleSelect' class='btn btn-xs btn-info'>Toggle Select</button>";
			}
		}
		echo "</div>";
		
        $view = $this->getView();
        //echo "<pre>"; print_r($view); die;
        
                $glyph_opts = array(map => array(checkbox => 'glyphicon glyphicon-unchecked'));
        $glyph_opts=json_encode($glyph_opts);
        $glyph_opts='{map:{checkbox: "icon-check-empty",checkboxSelected: "icon-check"}}';
        
        FancytreeAsset::register($view);
        $id = 'fancyree_' . $this->id;
        if (isset($this->options['id'])) {
            $id = $this->options['id'];
            unset($this->options['id']);
        } else {
            echo Html::tag('div', '', ['id' => $id]);
        }
        $options = Json::encode(ArrayHelper::merge([
            'activeVisible' => $this->activeVisible,
            'glyph' => 'css/iconos.js',
            'ajax' => $this->ajax,
            'aria' => $this->aria,
            'autoActivate' => $this->autoActivate,
            'autoCollapse' => $this->autoCollapse,
            'autoScroll' => $this->autoScroll,
            'checkbox' => $this->checkbox,
            'clickFolderMode' => $this->clickFolderMode,
            'debugLevel' => $this->debugLevel,
            'defaultKey' => $this->defaultKey,
            'enableAspx' => $this->enableAspx,
            'extensions' => $this->extensions,
            'toggleEffect' => $this->toggleEffect,
            'generateIds' => $this->generateIds,
            'icon' => $this->icon,
            'idPrefix' => $this->idPrefix,
            'imagePath' => $this->imagePath,
            'keyboard' => $this->keyboard,
            'keyPathSeparator' => $this->keyPathSeparator,
            'minExpandLevel' => $this->minExpandLevel,
            'scrollOfs' => $this->scrollOfs,
            'scrollParent' => $this->scrollParent,
            'selectMode' => $this->selectMode,
            'source' => $this->source,
            'quicksearch' => $this->quicksearch,
            'parent' => $this->parent,
            'strings' => $this->strings,
            'tabindex' => $this->tabindex,
            'titlesTabbable' => $this->titlesTabbable,
        ], $this->options));
        $view->registerJs('$("#' . $id . '").fancytree( ' . $options . ')');
        if ($this->hasModel() || $this->name !== null) {
            //$name = $this->hasModel() ? Html::getInputName($this->model, $this->attribute) : $this->name;
            $name = Html::getInputName($this->model, $this->attribute);
            //print_r($name);die;
            $selected = $this->selectMode == self::SELECT_SINGLE ? "\"{$name}\"" : "\"{$name}\"";
            //$selected = $this->selectMode == self::SELECT_SINGLE ? 'undefined' : "\"{$name}\"";
            //$active = $this->selectMode == self::SELECT_SINGLE ? "\"{$name}\"" : 'undefined';
            $active = 'undefined';
            //$active = $this->selectMode == self::SELECT_SINGLE ? $name : 'undefined';
            
            //$selected=$name.'[]';
            //print_r($selected);die;
            //$selected = "Rol[operaciones]";
            
			if (isset($this->options['isexpand'])) {
				if($this->options['isexpand']){
					$view->registerJs('$("#'.$idPrefix.'ExpandAll").click(function(event){event.preventDefault(); $("#'.$id.'").fancytree("getRootNode").visit(function(node){node.setExpanded(true);});});');
				}
			}
            
			if (isset($this->options['iscollapse'])) {
				if($this->options['iscollapse']){
					$view->registerJs('$("#'.$idPrefix.'CollapseAll").click(function(event){event.preventDefault(); $("#'.$id.'").fancytree("getRootNode").visit(function(node){node.setExpanded(false);});});');
				}
			}

			if (isset($this->options['istoggleexpand'])) {
				if($this->options['istoggleexpand']){
					$view->registerJs('$("#'.$idPrefix.'ToggleExpand").click(function(event){event.preventDefault(); $("#'.$id.'").fancytree("getRootNode").visit(function(node){node.toggleExpanded();});});');
				}
            }
            
			if (isset($this->options['issetall']) && $this->selectMode == self::SELECT_MULTI) {
				if($this->options['issetall']){
					$view->registerJs('$("#'.$idPrefix.'SetAll").click(function(event){event.preventDefault(); $("#'.$id.'").fancytree("getTree").visit(function(node){node.setSelected(true);});});');
				}
			}
            
			if (isset($this->options['isunsetall']) && $this->selectMode == self::SELECT_MULTI) {
				if($this->options['isunsetall']){
					$view->registerJs('$("#'.$idPrefix.'UnsetAll").click(function(event){event.preventDefault(); $("#'.$id.'").fancytree("getTree").visit(function(node){node.setSelected(false);});});');
				}
			}

			if (isset($this->options['istoggleselect']) && $this->selectMode == self::SELECT_MULTI) {
				if($this->options['istoggleselect']){
					$view->registerJs('$("#'.$idPrefix.'ToggleSelect").click(function(event){event.preventDefault(); $("#'.$id.'").fancytree("getRootNode").visit(function(node){node.toggleSelected();});});');
				}
            }

            $view->registerJs('$("#' . $id . '").parents("form").submit(function(){$("#' . $id . '").fancytree("getTree").generateFormElements(' . $selected . ', ' . $active . ')});');
            //$selected = 'gustavo';
            //echo "<pre>";echo "campo ".$this->idfield." /campo ";print_r($this->model->id_menu);die;
             //$idfield = $this->idfield;
            $idfield = $this->idfield; 
            if (!empty($this->parent && $this->model->$idfield)) {
                $view->registerJs('$("#' . $id . '").fancytree("getTree").activateKey("' . $this->model->$idfield . '");');
                $view->registerJs('$("#' . $id . '").fancytree("getTree").getNodeByKey("' . $this->parent . '").setSelected(true)');
            } elseif ($this->model->$idfield) {
                $attribute = $this->attribute;
                //print_r($attribute);die;
                //echo'<pre>'; print_r($this->model->$attribute); die;
                //$view->registerJs('$("#' . $id . '").fancytree("getTree").activateKey("' . $this->model->$attribute . '");');
                //$view->registerJs('$("#' . $id . '").fancytree("getTree").getNodeByKey("' . $this->model->$attribute . '").setSelected(true)');
                if($this->selectMode == self::SELECT_SINGLE)
                {
                    $view->registerJs('$("#' . $id . '").fancytree("getTree").activateKey("'.$this->model->$attribute.'");');
                    $view->registerJs('$("#' . $id . '").fancytree("getTree").getNodeByKey("'.$this->model->$attribute.'").setSelected(true)');
                }
                else
                {
                    foreach($this->model->$attribute as $node)
                    {
                        $view->registerJs('$("#' . $id . '").fancytree("getTree").activateKey("'.$node.'");');
                        $view->registerJs('$("#' . $id . '").fancytree("getTree").getNodeByKey("'.$node.'").setSelected(true)');
                    }
                }
            }
        }
    }
}