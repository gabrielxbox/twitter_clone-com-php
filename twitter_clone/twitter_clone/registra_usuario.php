<?php

require_once('db.class.php');

  $usuario =  $_POST['usuario'];
  $email = $_POST['email'];
  $senha = md5($_POST['senha']) ;

/*
a qui sao criptografia dos dados do banco 
mais so o  'base64_decode()' tem como converte de novo
mao unica 32
md5(str)
mao unica 40
sha1(str)
mao dupla 
base64_decode()
*/
$banco = new banco();
$link=$banco->conecta_mysql();

//para printa na tela variavel do banco
$usuario_existe = false;
$email_existe = false;

// verificar  se o usuario já
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' ";
// se ouver dados ele tras true se nao tras false 
if ($resultado_id = mysqli_query($link , $sql)) {
	
	$dados_usuario = mysqli_fetch_array($resultado_id);
          if(isset($dados_usuario['usuario'])){
              	$usuario_existe = true;
              }
          }else{
          	    
          	//echo 'erro ao tentar localizar o registro de usuario';

          }
      
      
// verificar se o e-mail ja
 
 $sql = "SELECT * FROM usuarios WHERE email = '$email' ";
        if ($resultado_id = mysqli_query($link , $sql )) {

        	$dados_usuario = mysqli_fetch_array($resultado_id);

        	if (isset($dados_usuario['email'])){
        		$email_existe = true;
            
            }
            
            }else{
              echo'erro ao tentar localizar o registro de email';
          
            }

        
   
        // faz a verificação e manda como mensagem o que ta errado

         if (  $usuario_existe || $email_existe ) {

                $retorno_get = '';
            
             if ($usuario_existe) {
             	 $retorno_get.="erro_usuario=1&";
             }
             if($email_existe){
             	$retorno_get.="erro_email=1&";
             }
         	
         	header('Location: inscrevase.php?'.$retorno_get);
             die();

         }


    
    

//para para ate ver se existe dados  
//die();
// variavel de insert 
$sql = "insert into usuarios( usuario ,email ,senha) values ('$usuario','$email','$senha')";

 // execultr a query 

 if(mysqli_query($link, $sql)){
     echo "Usuario registrado com sucesso!";
 }else{
      echo " erro ao registrar usuario tente de  novo!";
 }

?>