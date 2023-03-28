<?php
	$url = explode('/',$_GET['url']);
	

	$verifica_categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$verifica_categoria->execute(array($url[1]));
	if($verifica_categoria->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'noticias');
	}
	$categoria_info = $verifica_categoria->fetch();

	$post = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ? AND categoria_id = ?");
	$post->execute(array($url[2],$categoria_info['id']));
	if($post->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'noticias');
	}

	//É POR QUE MINHA NOTICIA EXISTE
	$post = $post->fetch();

?>
<section class="noticia-single">
	<div class="center">
	<header>
		<h1><i class="fa fa-calendar"></i> <?php echo $post['data'] ?> - <?php echo $post['titulo'] ?></h1>
	</header>
	<article>
		<?php echo $post['conteudo']; ?>
		
	</article>
	<?php 
	if(Painel::logado() == false){
	?>
		<div class="erro-comentar">
			<p>Você precisa estar conectado no perfil para comentar, clique <a href="<?php echo INCLUDE_PATH ?>painel">aqui</a> e conecte-se.</p>
		</div>
	<?php
	}else{
	?>

		<h2 class="postar-comentario">Faça um comentário <i class="fa fa-comment"></i></h2>
		<form action="" method="post">
			<input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" disabled>
			<textarea name="mensagem" id="" cols="30" rows="10" placeholder="Seu comentario..."></textarea>
			<input type="hidden" name="noticia_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="enviar_comentario" value="Comentar!">
		</form>
		<br>
		<h2 class="postar-comentario">Comentários Existente <i class="fa fa-comments"></i></h2>
		<?php 
			$comentarios = Mysql::conectar()->prepare("SELECT * FROM `tb_site.comentarios` WHERE noticia_id = ? ORDER BY id DESC");
			$comentarios->execute(array($post['id']));
			$comentarios = $comentarios->fetchAll();
			foreach($comentarios as $key => $value){
				$comentario_id = $value['id'];
				
		?>
		<div class="box-coment-noticia">
			<h3><?php echo $value['usuario_nome']; ?></h3>
			<p><?php echo $value['comentario']; ?></p>
			<?php
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site_resposta.comentario` WHERE comentario_id = ?");
				$sql->execute(array($value['id']));
				$respostas = $sql->fetchAll();

				$display_none = '';
				if($sql->rowCount() == 0)
					$display_none = 'style="display:none;"'
			?>
			<div class="respostas-comentarios" <?php echo $display_none; ?>>
				<h5>Respostas</h5>
				
					<?php 
						foreach($respostas as $key => $result){
					?>
					<div class="resposta-single">
						<h4><?php echo $result['nome']; ?></h4>
						<p><?php echo $result['comentario']; ?></p>
					</div>
					<?php } ?>
			</div>
			<form action="" method="post">
				<textarea name="resposta" id="" cols="30" rows="10" placeholder="Sua resposta..."></textarea>
				<input type="hidden" name="comentario_id" value="<?php echo $comentario_id; ?>">
				<input type="submit" name="resposta_comentario" value="Responder!">
			</form>
		</div>
		<?php } ?>
	<?php } ?>
	</div>
</section>