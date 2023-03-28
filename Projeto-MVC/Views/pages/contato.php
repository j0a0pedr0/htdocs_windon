<div class="chamada">
    <div class="overlay"></div>
    <div class="center">
        <h2><?php echo $arr['titulo']; ?></h2>
    </div><!--center-->
</div><!--chamada-->

<div class="contato">
    <div class="overlay"></div>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome..." />
        <textarea name="mensagem" placeholder="Sua Mensagem..."></textarea>
        <input type="submit" name="acao" value="Enviar!" />
    </form>
</div><!--contato-->