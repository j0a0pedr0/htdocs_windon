<?php

    namespace Controllers;

    class ContatoController Extends Controller
    {

        private $view;

        public function __construct(){
            
        }

        public function executar(){
            $url = @$_GET['url'];
            if(isset($_POST['acao'])){
                \Models\ContatoModel::enviarFormulario();
            }
            \Router::rota('contato',function(){
                $this->view = new \Views\MainView('contato');
                $this->view->render(array('titulo'=>'Contato'));
            });

            //if(@$url == 'contato/erro'){
                \Router::rota('contato/erro',function(){
                    $this->view = new \Views\MainView('contato-erro');
                    $this->view->render(array('titulo'=>'Contato'));
                });    
            //}else if(@$url == 'contato/sucesso'){
                \Router::rota('contato/sucesso',function(){
                    $this->view = new \Views\MainView('contato-sucesso');
                    $this->view->render(array('titulo'=>'Contato'));
                });
            //}

            
        }
    }

?>