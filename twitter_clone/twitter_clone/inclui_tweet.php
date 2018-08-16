<?php

session_start();
 // controle de twitter
if (!isset($_SESSION['id_usuario'])) {
	herder('Location: index>php?erro=1');

}
require_once('db.class.php');

$texto_tweet = $_POST['texto_tweet'];
// é trazido do login do ususario
$id_usuario = $_SESSION['id_usuario'];


// para compara se é diferente de vazia se fo vazia nao faz o comando
if($texto_tweet == '' || $id_usuario == '') {
//para para 
// tem que repara a qui o die();	
	//die();
	die();

}

$sql = " INSERT INTO tweet(id_usuario, tweet) VALUES( $id_usuario,'$texto_tweet') ";



$banco = new banco();

$link = $banco->conecta_mysql();


mysqli_query($link,$sql);








?>