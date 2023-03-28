<?php
	
	namespace Controllers;
	class HomeController
	{
		public function __construct(){
			
		}
		public function executar(){
			$this->view = new \Views\MainView('home');
			$this->view->render(array('titulo'=>'Home'));
		}
	}
?>