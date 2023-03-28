<?php

    namespace Controllers;

    class HomeController Extends Controller
    {

        private $view;
        private $model;

        public function __construct(){
            $this->view = new \Views\MainView('home');
        }

        public function executar(){
            $this->view->render(array('titulo'=>'Home'));
        }
    }

?>