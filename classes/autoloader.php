<?php
class AutoLoader
{
  static function AutoLoad($class_name){
    require  $class_name . '.php';
  }
  
}
?>