<?php
    namespace Models;

    Class ContatoModel
    {
        public static function enviarFormulario(){
            $corpo = '';
            $assunto = 'Projeto-MVC';

            foreach($_POST as $key => $value) {
                $corpo.= ucfirst($key).": ".$value."<hr>";
                
            }
            $info = array('assunto'=>$assunto,'corpo'=>$corpo);

            
            $mail = new \Email('smtp.hostinger.com','joaopedroexemplo@cursospoderfeminino.com','Jaca1000$','Joao');
            $mail->addAddress('joaopedroexemplo@cursospoderfeminino.com','Joao pedro');
            $mail->formatarEmail($info);
            $mail->enviarEmail();

            $return = '';
            
            if($mail->enviarEmail() == false){
                echo '<script>location.href="'.INCLUDE_PATH.'contato/erro"</script>';
                die();
            }else{
                echo '<script>location.href="'.INCLUDE_PATH.'contato/sucesso"</script>';
                
            }

            return $return;
        }    
    }
?>