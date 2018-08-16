<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$nome_pessoa = $_POST['nome_pessoa'];

$id_usuario = $_SESSION['id_usuario'];

$banco = new banco();

$link = $banco->conecta_mysql();

$sql= "SELECT * FROM usuarios WHERE usuario  LIKE '%$nome_pessoa%' AND id <> $id_usuario ";

$nome_pessoas = mysqli_query($link, $sql);

if($nome_pessoas){
	


	while($resultado = mysqli_fetch_array($nome_pessoas, MYSQLI_ASSOC)){

		echo '<a href="#" class="list-group-item">'; 
		echo '<strong>'.$resultado['usuario'].'</strong> <small> - '.$resultado['email'].' </small>';
		// para fica frutuano na regiao direita
		echo'<p class="list-group-item-text pull-right">';
		// tem um botao a qui 
echo '<button type="button" class="btn btn-default btn_seguir" data-id_usuario="'.$resultado['id'].'">Seguir</button>';
	     	echo'</p>';
		// classe para corige div
		echo '<div class="clearfix"></div>';	
		
		echo '</a>';

	}

/*  data-id_usuario="'.$resultado['id'].'" é um atributo prefiquissado para recupera o id pelo o butao mais é prefiquisado do html 5 */



}else{

	echo 'erro ao tentar localizar as pessosas';

}








?>