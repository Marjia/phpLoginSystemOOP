<?php

spl_autoload_register('myAutoloader');

function myAutoloader($className){

  //converting class name first letter into small letter
  $uClassName = lcfirst($className);

  //defining url
  $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  if (strpos($url, 'includes') !== false) {
    $path = '../classes/';
  }
  else {
      $path = 'classes/';
  }
  $extension = '.class.php';

 //echo $path.$uClassName.$extension;

 //loading class file inside  classes folder
  if (strpos($url, 'classes') !== false) {
    require_once $uClassName.$extension;
  }
  else {
    //loading  class file from outside of classes folder
    require_once $path.$uClassName.$extension;
  }
}
