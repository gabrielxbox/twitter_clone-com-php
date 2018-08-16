<?php

session_start();


require_once('db.class.php');


$usuario = $_POST['usuario'];
$senha =  md5($_POST['senha']);


// variavel de select
$sql = "SELECT id,usuario,email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";


$banco = new banco();
$link = $banco->conecta_mysql();



$resultado_id = mysqli_query($link, $sql);
// a qui é para trazer um select
// para pestar a consulta 

if ($resultado_id){
	$dados_usuario = mysqli_fetch_array($resultado_id);	
       // verificano se existe usuario
	if (isset($dados_usuario['usuario'])){
		// a qui é para recupera o usuario pela a session das paisnas 
		$_SESSION['id_usuario'] = $dados_usuario['id'];
		//para passa o id em um relacionamento
		$_SESSION['usuario'] = $dados_usuario['usuario'];
		$_SESSION['email'] = $dados_usuario['email'];
		
		header('Location:home.php');

	}else{
		// para da retorno de paisna caso usuario errado
		header('Location: index.php?erro=1');
	}

}else{

	echo 'erro na execução da consuta favor entra, em contado com o admin do site';

}










// vai a prender u
// pdade retorna true / false
//insert retorna true / false
//select false / resouce
//delete retorna true / false

?>