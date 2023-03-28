<?php
	
	class Site{

		public static function updateUsuarioOnline(){
			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$check = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
				$check->execute(array($_SESSION['online']));

				if($check->rowCount() == 1){
					$sql = MySql::conectar()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?");
					$sql->execute(array($horarioAtual,$token));
				}else{
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
			    $ip = $_SERVER['REMOTE_ADDR'];
				}
					$token = $_SESSION['online'];
					$horarioAtual = date('Y-m-d H:i:s');
					$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
					$sql->execute(array($ip,$horarioAtual,$token));
				}
			}else{
				$_SESSION['online'] = uniqid();
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				    $ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
				    $ip = $_SERVER['REMOTE_ADDR'];
				}
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?)");
				$sql->execute(array($ip,$horarioAtual,$token));
			}
		}

		public static function contador(){
			if(!isset($_COOKIE['visita'])){
				setcookie('visita','true',time() + (60*60*24*7));
				$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.visitas` VALUES (null,?,?)");
				$sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
			}
		}

		public static function comentarNoSite(){
			if(isset($_POST['enviar_comentario'])){
				$usuario_id = $_SESSION['id'];
				$usuario_nome = $_SESSION['nome'];
				$comentario = $_POST['mensagem'];
				$noticia_id = $_POST['noticia_id'];
				if($comentario == '')
				return false;
				$sql = Mysql::conectar()->prepare("INSERT INTO `tb_site.comentarios` VALUES (null,?,?,?,?)");
				$sql->execute(array($usuario_id,$usuario_nome,$comentario,$noticia_id));
				echo '<script>alert("Enviado com sucesso")</script>';
			}
		}
		public static function responderComentario(){
			if(isset($_POST['resposta_comentario'])){
				$nome_resposta = $_SESSION['nome'];
				$comentario_id = $_POST['comentario_id'];
				$resposta_comentario = $_POST['resposta'];
				if($resposta_comentario == '')
				return false;
				$sql = Mysql::conectar()->prepare("INSERT INTO `tb_site_resposta.comentario` VALUES (null,?,?,?)");
				$sql->execute(array($comentario_id,$nome_resposta,$resposta_comentario));
				echo '<script>alert("Respondido com sucesso")</script>';
			}
		}

	}

?>