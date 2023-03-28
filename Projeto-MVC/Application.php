<?php
    define('INCLUDE_PATH','http://localhost/Projeto-MVC/');
    define('INCLUDE_PATH_FULL','http://localhost/Projeto-MVC/Views/pages/');

    class Application
    {
        
        public function executar(){
            $url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'home';
            
            $url = ucfirst($url);
            $url.="Controller";
            if(file_exists('Controllers/'.$url.'.php')){
                $className = 'Controllers\\'.$url;
                $controler = new $className;
                $controler->executar();
            }else{
                die("Não existe esse controlador!");
            }
        }
    }
?>