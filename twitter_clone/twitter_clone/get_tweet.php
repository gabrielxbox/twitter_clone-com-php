
<?php
//para retorna os tweet na paisna
session_start();
//teste de session para saber se usuario nao é vazil
if (!isset($_SESSION['id_usuario'])) {
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];

$id= $_SESSION['id_usuario'];

$banco = new banco();
$link = $banco->conecta_mysql();

$sql = "SELECT DATE_FORMAT(t.data_incrusao, '%d %b %Y %T') AS data_incrusao_formatada, t.tweet, u.usuario ";
$sql.="FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id ) ";
$sql.="WHERE id_usuario = $id_usuario   ORDER by  data_incrusao DESC "; 


$resultado_id = mysqli_query($link, $sql);



if($resultado_id){
	// para retorna varias variavel no array
	while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
		//a idea  a qui <a herf="#" class="list-grup-item">' é trazer os dados em uma lista botstrap
		echo'<a herf="#" class="list-group-item">';

		echo '<h4 class="list-group-item-heading">'.$registro['usuario'].' <small> -'.$registro['data_incrusao_formatada'].'</small></h4>';
		
		echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
		
		echo '</a>';
		
	}

}else{


	echo 'erro na consulta de tweets no banco de dados!';

}

?>