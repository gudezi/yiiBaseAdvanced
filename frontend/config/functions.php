<?php
/*
* Code by DangNH
* Date: Apr 4, 2016
*/
 
/**
* Debug function
* d($var);
*/
function d() 
{
   echo '<pre style="margin: 50px 0 10px;">';
   for ($i = 0; $i < func_num_args(); $i++) 
   {
      yii\helpers\VarDumper::dump(func_get_arg($i), 10, true);
   }
   echo '</pre>';
}
 
/**
* Debug function with die() after
* dd($var);
*/
function dd() 
{
   for ($i = 0; $i < func_num_args(); $i++) 
   {
      d(func_get_arg($i));
   }
   die();
}

/**
 * Debug function
 * d($var);
 */
function d1($var,$caller=null)
{
    if(!isset($caller)){
        $caller = array_shift(debug_backtrace(1));
    }
    echo '<code>File: '.$caller['file'].' / Line: '.$caller['line'].'</code>';
    echo '<pre>';
    yii\helpers\VarDumper::dump($var, 10, true);
    echo '</pre>';
}
 
/**
 * Debug function with die() after
 * dd($var);
 */
function dd1($var)
{
    $caller = array_shift(debug_backtrace(1));
    d1($var,$caller);
    die();
}
?> 