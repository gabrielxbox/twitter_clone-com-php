<?php


session_start();
/*para eliminar a seeison tem que passar o unsetna variavel sa session */

 unset($_SESSION['usuario']);
unset($_SESSION['email']);

/*
a qui é minha logica
*/

if($_SESSION['usuario'] = true){
	header('Location: index.php');
  
}



?>