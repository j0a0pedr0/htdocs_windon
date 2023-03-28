<?php
  $pdo = new PDO('mysql:host=localhost;dbname=projeto_bootstrap','root','');
  $sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
  $sobre->execute();
  $sobre = $sobre->fetch()['sobre'];
  include('./class/Painel.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Painel de Controle-bootstrap</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
  
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ViagemAgora.Com</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul id="menu-principal" class="nav navbar-nav">
              <li class="active"><a ref_sys="sobre" href="#">Editar Sobre</a></li>
              <li><a ref_sys="cadastrar_equipe" href="#">Cadastrar Equipe</a></li>
              <li><a ref_sys="lista_equipe" href="#">Listar Equipe</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="?sair"><span style="color:#f56d6d;"class="glyphicon glyphicon-off text-dark"></span> Sair</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="box">
      <header id="header">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-7 col-12">
              <h2><span class="glyphicon glyphicon-cog"></span> Painel de controle</h2>
            </div><!--col-md-6-->
            <div class="col-md-4 col-sm-5 col-12 text-right">
              <p>Seu último login foi em: 13/08/22  <span class="glyphicon glyphicon-calendar"></span></p>
            </div><!--col-md-6-->
          </div><!--row-->
        </div><!--container-->
      </header>

      <div class="breid">
        <div class="container">
          <ol class="breadcrumb">
            <li class="active"><a href="#">Home</a></li>
          </ol>
        </div><!--container-->
      </div><!--breid-->

      <section class="section-principal">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item cor-padrao"><span class="badge">14</span><span class="glyphicon glyphicon-pencil"></span> <a ref_sys="sobre" style="color:black!important;text-decoration:none;" href="#">Sobre</a></li>
              <li class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> <a ref_sys="cadastrar_equipe" style="color:black!important;text-decoration:none;" href="#">Cadastrar Equipe</a></li>
              <li class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> <a ref_sys="lista_equipe" style="color:black!important;text-decoration:none;" href="#">Listar Equipe</a></li>
            </ul>
            </div><!--col-md-3-->
            
            <div class="col-md-9">
            <?php if(isset($_POST['editar_sobre'])){
              $sobre = $_POST['sobre'];
              $pdo->exec("DELETE FROM `tb_sobre`");
              $sql = $pdo->prepare("INSERT INTO `tb_sobre` VALUES(null,?)");
              $sql->execute(array($sobre));
              echo '<div class="alert alert-success" role="alert">A Sessão <b>Diferenciais</b> foi editada com Sucesso</div>';
              $sobre = $pdo->prepare("SELECT * FROM `tb_sobre`");
              $sobre->execute();
              $sobre = $sobre->fetch()['sobre'];
               
            }else if(isset($_POST['cadastrar_equipe'])){
              $imagem = $_FILES['imagem'];
              if($_POST['nome'] == ''){
                echo '<div class="alert alert-danger" role="alert">Campo Nome Vazio</div>';
              }else if($_POST['descricao'] == ''){
                echo '<div class="alert alert-danger" role="alert">Campo descricao Vazio</div>';
              }else if(Painel::imagemValida($imagem) == false){
                echo '<div class="alert alert-danger" role="alert">Imagem Inválida(Apenas tipo= jpg--jpeg--pnj)</div>';
              }else{
                //TUDO VALIDO A SO INSERIR NO BANCO DE DADOS
                $imagem = Painel::uploadFile($imagem);
                $equipe = array($_POST['nome'],$_POST['descricao'],$imagem);
                $sql = $pdo->prepare("INSERT INTO `tb_equipe` VALUES(null,?,?,?)");
                $sql->execute($equipe);
                echo '<div class="alert alert-success" role="alert">Membro <b>Cadastrado</b> com Sucesso</div>';
              }
              
            } ?>
              <div id="sobre-section" class="panel panel-default">
                <div class="panel-heading cor-padrao">
                  <h3 class="">Sobre</h3>
                </div>
                <div class="panel-body">
                  <form method="POST">
                      <label for="basic-url">Código HTML:</label>
                      <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-save-file" id="basic-addon1"></span>
                        <textarea name="sobre" class="form-control" style="resize:vertical;max-height:250px;height:120px;"><?php echo $sobre; ?></textarea>
                      </div>

                      <div class="btn-group" style="margin-top:15px;position:relative;left:50%;transform:translateX(-50%);">
                          <input type="hidden" value="" name="editar_sobre">
                          <button type="submit" name="acao" class="btn btn-default">Feito</button>
                      </div>
                  </form>
                </div>
              </div>

              <div id="cadastrar_equipe-section" class="panel panel-default">
                <div class="panel-heading cor-padrao">
                  <h3 class="">Cadastrar Equipe</h3>
                </div>
                <div class="panel-body">
                  <form method="POST" enctype="multipart/form-data">
                      <label for="basic-url">Nome do Membro:</label>
                      <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
                        <input type="text" name="nome" class="form-control" id="basic-url">
                      </div>

                      <label for="">Descrição do Membro</label>
                      <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-envelope" id="basic-addon1"></span>
                        <textarea class="form-control" name="descricao" style="resize:vertical;max-height:250px;height:120px;"></textarea>
                      </div>

                      <label for="">Imagem do Membro</label>
                      <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
                        <input type="file" name="imagem" class="form-control"/>
                      </div>

                      <div class="btn-group" style="margin-top:15px;position:relative;left:50%;transform:translateX(-50%);">
                          <input type="hidden" value="" name="cadastrar_equipe">
                          <button type="submit" name="acao" class="btn btn-default">Feito</button>
                      </div>
                  </form>
                </div>
              </div>

              <div id="lista_equipe-section" class="panel panel-default">
                <div class="panel-heading cor-padrao">
                  <h3 class="">Membros da Equipe</h3>
                </div>
                <div class="panel-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>IP</th>
                        <th>Nome do Membro</th>
                        <th>  </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $equipe = $pdo->prepare("SELECT * FROM `tb_equipe`");
                          $equipe->execute();
                          $equipe = $equipe->fetchAll();
                          foreach($equipe as $key => $value){
                      ?>
                      <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['nome']; ?></td>
                        <td><button idMembro="<?php echo $value['id']; ?>" type="button" class="deletar-membro btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Excluir</button></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!--col-md-9-->
          </div><!--row-->
        </div><!--container-->
      </section><!--section-principal-->
    </div><!--box-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function(){
          ScrollItem();
          cliqueMenu();
            function cliqueMenu(){
              $('#menu-principal a, .list-group a').click(function(){
                $('.list-group a').parent().removeClass('active').removeClass('cor-padrao');
                $('#menu-principal a').parent().removeClass('active');
                
                $('#menu-principal a[ref_sys='+$(this).attr('ref_sys')+']').parent().addClass('active');
                $('.list-group a[ref_sys='+$(this).attr('ref_sys')+']').parent().addClass('cor-padrao');
                return false;
              });
            };

            function ScrollItem(){
              $('#menu-principal a, .list-group a').click(function(){
                  var ref = '#'+$(this).attr('ref_sys')+'-section';
                  var offSet = $(ref).offset().top;
                  $('html,body').animate({'scrollTop':offSet - 55});
                  
                  if($(window)[0].innerWidth <= 768){
                     $('.icon-bar').click();
                  }
                  
                  return false;
              });
            };

            $('button.deletar-membro').click(function(){
              var id_membro = $(this).attr('idMembro');
              var el = $(this).parent().parent();

              $.ajax({
                method:'post',
                data:({'id_membro':id_membro}),
                url:'deletar.php'
              }).done(function(){
                  el.fadeOut(function(){
                    el.remove();
                  });
              })
              
            });

        });
    </script>
  </body>
</html>