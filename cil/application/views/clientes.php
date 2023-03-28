<?php
	echo '<ul>';
	foreach ($clientes as $key => $value) {
		echo '<li><a href="clientes/'.$value['id'].'">'.$value['nome'].'</a></li>';
	}
	echo '</ul>';
?>

<h2>Cadastrar novo cliente</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('clientes'); ?>

	<input type="text" name="nome" placeholder="Nome...">
	<input type="text" name="email" placeholder="E-mail...">
	<input type="submit" value="Cadastrar!">

</form>