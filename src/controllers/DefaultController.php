<?php

require_once 'AppController.php';
require_once __DIR__.'/../security/Authorization.php';



class DefaultController extends AppController{

    public function index() {
        $this->render('index');
    }

    public function login() {
        $this->render('login');
    }
    
    public function register() {
        $this->render('register');
    }


    public function main() {
        Authorization::checkLogin();
        $this->render('main');
    }
}