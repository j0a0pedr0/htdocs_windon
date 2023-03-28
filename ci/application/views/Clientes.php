<h2>Todos os clientes</h2>
<ul>
    <?php foreach($clientes as $key => $value){?>
        <li><a href="clientes/<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></a></li>
        <hr>
    <?php } ?>
</ul>
<br>
<br>

<h2>Cadastrar novo cliente</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('clientes'); ?>

        <input type="text" name="nome" placeholder="Seu nome..."/>
        <input type="email" name="email" placeholder="Seu email..."/>
        <input type="submit" value="Cadastrar!"/>

</form>