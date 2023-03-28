<?php

    class Mysql
    {
        private static $pdo;

        public static function Conectar(){
            SELF::$pdo = new PDO('mysql:host=localhost;dbname=teste_pratico','root','');
            if(SELF::$pdo != false){
            }else{
                echo '<script>alert("Erro ao Conectar!")<script>';
            }
            return SELF::$pdo;
        }
    }
?>