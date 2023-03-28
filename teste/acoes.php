<?php 


include('Mysql.php');
    
if(isset($_POST['cadastrar_aluno'])){
    

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    if($nome == '' || $email == '' || $cpf == '' || $senha == ''){
        //die("Campos vazios não são permitidos");
        echo '<script>alert("Erro-Campos Vazios!!!");location.href="http://localhost/TESTE/"</script>';
        die();
    }
    $inserirAluno = Mysql::Conectar()->prepare("INSERT INTO `tb_admin.alunos` VALUES (null,?,?,?,?)");
    if($inserirAluno->execute(array($nome,$email,$cpf,$senha))){
        echo '<script>alert("Cadastro realizado com sucesso!, Por favor faça o primeiro login");location.href="http://localhost/TESTE/"</script>';
    }else{
        echo '<script>alert("Ocorreu Algum erro no sistema..por favor reporte!!!");location.href="http://localhost/TESTE/"</script>';
    }

}


if(isset($_POST['logar_aluno'])){
    $email = $_POST['email_login'];
    $senha = $_POST['senha_aluno'];
    
    $logar_aluno = Mysql::Conectar()->prepare("SELECT * FROM `tb_admin.alunos` WHERE email=? AND senha=?");
    $logar_aluno->execute(array($email,$senha));
    $aluno_info = $logar_aluno->fetch();
    if($logar_aluno->rowCount() == 1){
        
        $_SESSION['logado'] = true;
        $_SESSION['id'] = $aluno_info['id'];

        echo '<script>alert("Logado com sucesso!!! '.$aluno_info['nome'].'");location.href="http://localhost/TESTE/"</script>';
    }else{
        echo '<script>alert("Email ou Senha Incorretos");location.href="http://localhost/TESTE/"</script>';
        die();
    }
}



if(isset($_POST['atualizar_aluno'])){

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    if($nome == '' || $senha == ''){
        //die("Campos vazios não são permitidos");
        echo '<script>alert("Erro-Campos Vazios!!!");location.href="http://localhost/TESTE/painel.php"</script>';
        die();
    }
    $atualizar = Mysql::conectar()->prepare("UPDATE `tb_admin.alunos` SET nome='$nome',senha='$senha' WHERE id=?");
    if($atualizar->execute(array($_SESSION['id']))){
        echo '<script>alert("dados Atualizados com sucesso!!!");location.href="http://localhost/TESTE/"</script>';
        
    }
}
if(isset($_POST['sair'])){
    session_destroy();
    echo '<script>location.href="http://localhost/TESTE/"</script>';
    die();
}

if(isset($_POST['deletar'])){
    $deletar = Mysql::conectar()->prepare("DELETE FROM `tb_admin.alunos` WHERE id=?");
    if($deletar->execute(array($_SESSION['id']))){
        session_destroy();
        echo '<script>alert("Deletado com sucesso!!!");location.href="http://localhost/TESTE/"</script>';
    }else{
        session_destroy();
        echo '<script>alert("erro no servidor, por favor reporte");location.href="http://localhost/TESTE/"</script>';
    }
}
?>