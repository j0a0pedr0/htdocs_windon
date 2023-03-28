<div class="chamada">
    <div class="overlay"></div>
    <div class="center">
        <h2><?php echo $arr['titulo']; ?></h2>
    </div><!--center-->
</div><!--chamada-->

<div class="contato">
    <div class="overlay"></div>
    <form method="POST">
        <h2>Erro ao Enviar o E-mail!!!</h2>
    </form>
</div><!--contato-->

<style type="text/css">
    footer{
        position:fixed;
        bottom:0;
    }
    div.contato{
        height:50%;
    }
    form h2{
        color:white;
        font-size:34px;
    }
</style>