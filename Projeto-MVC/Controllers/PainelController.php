<?php

    namespace Controllers;


    Class PainelController
    {
        private $view;

        public function __construct(){
            $this->view = new \Views\PainelView();
        }
        public function executar(){
            
            $this->view->render();
        }
    }

?>