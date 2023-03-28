<?php
	
	class MySql
	{
		private static $pdo;
		public static function connect(){
			if(isset($pdo) == false){
				self::$pdo = new PDO('mysql:host=localhost;dbname=frameworks','root','');
			}

			return self::$pdo;
		}
	}

?>