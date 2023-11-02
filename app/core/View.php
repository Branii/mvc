<?php

class View{

    protected $viewFile;
    protected $viewData;

    public function __construct($viewFile,$viewData){
        $this->viewFile = $viewFile;
        $this->viewData = $viewData;
    }

    public function render(){ // render the views
       
        if(file_exists(VIEW . $this->viewFile . ".phtml")){
            include VIEW . $this->viewFile . ".phtml";
        }else{
            echo "File not exist";
        }
    }

}