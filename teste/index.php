<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Portal Alunos</title>

</head>
<body>
<?php include('config.php');include('acoes.php');
if(@$_SESSION['logado'] == false){ ?>

    <header>
        <div class="center">
            <div class="logo">Portal Aluno </div><!--logo-->
            <div class="login_aluno">
                <form method="POST">
                    <input type="email" name="email_login" placeholder="Seu E-mail...">
                    <input type="password" name="senha_aluno" placeholder="Sua Senha...">
                    <input type="submit" name="logar_aluno" value="Entrar"/>
                </form>
            </div><!--login-aluno-->
        </div><!--center-->
    </header>


    <section class="cadastro_aluno">
        <div class="center">
            <form  method="POST">
                <div class="form-group">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" placeholder="Seu Nome..."/>
                </div><!--form-group-->

                <div class="form-group">
                    <label for="">E-Mail:</label>
                    <input type="email" name="email" placeholder="Seu E-Mail..."/>
                </div><!--form-group-->

                <div class="form-group">
                    <label for="">Seu CPF:</label>
                    <input type="number" name="cpf" placeholder="Seu CPF..."/>
                </div><!--form-group-->
                <div class="form-group">
                    <label for="">Senha:</label>
                    <input type="password" name="senha" placeholder="Sua Senha..."/>
                </div><!--form-group-->
                <div class="form-group">
                    <input type="submit" name="cadastrar_aluno" value="Cadastrar-se"/>
                </div><!--form-group-->
            </form>
        </div><!--center-->
    </section><!--cadastro_aluno-->
<?php }else if(@$_SESSION['logado'] == true){?>

    <h1 style="text-align:center;">Painel Aluno</h1>
<section class="painel">
    <div class="center">
        <div class="dados_aluno">
            <?php 
                $aluno = Mysql::Conectar()->prepare("SELECT * FROM `tb_admin.alunos` WHERE id=?");
                $aluno->execute(array($_SESSION['id']));
                $aluno = $aluno->fetch();
                
            ?>
            <ul>
                <li>Nome: <?php echo $aluno['nome']; ?></li>  
                <li>E-Mail: <?php echo $aluno['email']; ?></li>
                <li>CPF: <?php echo $aluno['cpf']; ?></li>
                <form class="display:inline-block;margin-top:20px;" method="POST">
                <input type="submit" name='sair' value="sair">
                <br>
                <br>
                <input type="submit" name="deletar" value='deletar'>
                </form>
            </ul>
        </div>
    </div><!--center-->
</section><!--painel-->
<section class="cadastro_aluno">
    <div class="center">
        
        <form  method="POST">
            <h2 style="text-align:center;margin-bottom:25px;width:100%;">Atualizar Dados </h2>
            <div class="form-group">
                <label for="">Nome:</label>
                <input type="text" name="nome" placeholder="Seu Nome..."/>
            </div><!--form-group-->

            <div class="form-group">
                <label for="">Senha:</label>
                <input type="password" name="senha" placeholder="Sua Senha..."/>
            </div><!--form-group-->
            <div class="form-group">
                <input type="submit" name="atualizar_aluno" value="Atualizar"/>
            </div><!--form-group-->
        </form>
    </div><!--center-->
</section><!--cadastro_aluno-->
<?php } ?>
    
</body>
</html>