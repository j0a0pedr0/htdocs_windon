<?php 

    $pdo = new PDO('mysql:host=localhost;dbname=projeto_bootstrap','root','');

    if(isset($_POST['id_membro'])){
        $sql = $pdo->prepare("DELETE FROM `tb_equipe` WHERE id = ? ");
        $sql->execute(array($_POST['id_membro']));
    }

?>