<?php

namespace gudezi\notifications;

/**
 * This is just an example.
 */
class NotificationsWidget extends \yii\base\Widget
{
    public $options;
    public $items;
    private $cantidad;
    public $directoryAsset;
    //private $messages;
    
    public function run()
    {
        //return "Hello!";
        
        if ($this->items=='') 
            $this->items=array();
        
        $this->cantidad = count($this->items);
        if ($this->cantidad==0) 
            $this->cantidad='';
        
        return $this->generate();
    }
    
    private function generate()
    {
        $head = $foot = '';
        $button = '
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">'.$this->cantidad.'</span>
            </a>';
        
        if($this->cantidad>0)
        {
            if($this->cantidad>1)
                $head='<ul class="dropdown-menu"><li class="header">Usted tiene '.$this->cantidad.' mensajes nuevos</li>';
            else
                $head='<ul class="dropdown-menu"><li class="header">Usted tiene 1 mensaje nuevo</li>';
            
            $messages = $this->display_mensajes($this->items);
            
            $foot = '</ul></li>';
        }
        
        return $button.$head.$messages.$foot;
    }

    private function display_mensajes($items)
    {
        $message = '<li><ul class="menu">';
        
        foreach($items as $item)
        {
            $message .= '<li>';
            if($item['url']!='')
                $message .= '<a href="'.$item['url'].'">';
            else
                $message .= '<a href="#">';
            
            if($item['image']!='')
                $message .= '<div class="pull-left"><img src="'.$item['image'].'" class="img-circle" alt="User Image">';
            else
                $message .= '<div class="pull-left"><img src="'.$this->directoryAsset.'/img/user2-160x160.jpg" class="img-circle" alt="User Image">';
                    
            $message .= '</div><h4>'.$item['user'].'<small><i class="fa fa-clock-o"></i> '.$item['time'].'</small></h4>';
            
            $message .= '<p>'.$item['message'].'</p></a></li>';
        }
        
        $message .= '</ul></li><li class="footer"><a href="#">Ver todos los mensajes</a></li>';
        
        return $message;
    }
}
