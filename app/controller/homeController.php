<?php

class homeController extends Controller {

    public function login($id='',$name=''){
        $this->view('home/login');
        $this->view->render();
    }

    public function check(){
        $this->view('home/check');
        $this->view->render();
    }

    public function register(){
        $this->view('home/register');
        $this->view->render();
    }

}