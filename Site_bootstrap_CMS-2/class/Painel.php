<?php
    class Painel
    {
        public static function imagemValida($imagem){
            if($imagem['type'] == 'image/jpeg' ||
                $imagem['type'] == 'image/jpg' ||
                $imagem['type'] == 'image/png'){

                    $tamanho = intval($imagem['size']/1024);
                    if($tamanho < 300)
                        return true;
                    else
                        return false;
                }else{
                    return false;
                }
        }
        
        public static function uploadFile($file){
            $formatoArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatoArquivo[1];
            if(move_uploaded_file($file['tmp_name'],'./uploads/'.$imagemNome)){
                return $imagemNome;
            }else{
                return false;
            }
        }

        public static function deleteFile($file){
            @unlink('./uploads/'.$file);
        }
    }
?>