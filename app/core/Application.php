<?php

class Application{
    
protected $homeController = 'homeController';
protected $authenController = 'authenController';
protected $action = 'index';
protected $params = [];

public function __construct(){
   $this->prepareURL();

   # check if the controller file exist 
   
   if(file_exists(CONTROLLER . $this->homeController .".php")){
    $this->homeController = new $this->homeController;
    //$this->controller->index();
       if(method_exists($this->homeController,$this->action)){
           call_user_func_array([$this->homeController,$this->action],$this->params);
       }
   }else{
    echo "File does not exist";
   }

}

    # prepare request

function prepareURL(){
$request = trim($_SERVER['REQUEST_URI'],'/');

if(!empty($request)){

    $url = explode("/",$request);
    $this->homeController = isset($url[0]) ? $url[0]. "Controller" : "homeController";
    $this->authenController = isset($url[0]) ? $url[0]. "Controller" : "authenController";
    $this->action = isset($url[1]) ? $url[1] : "index";
    unset($url[0],$url[1]);
    $this->params = !empty($url) ? array_values($url) : [];

}

} // end of function

} // end of class