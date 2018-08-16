<?php
// a qui tras a ssession dos dados para essa paisna e mostra la em baixo
session_start();
// verifica a seesion para retorna a paisna 
if (!isset($_SESSION['usuario'])) {
	header('Location: index.php?erro=1');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Twiter clone</title>
	<meta charset="utf-8">

	<!-- jquery - link cdn -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<script type="text/javascript">
		$(document).ready(function(){

        // associar o evento de click ao botao        
        $('#btn_procurar_pessoa').click(function(){
      // o comando length conta quantas palavras tem e compara
      if($('#nome_pessoa').val().length > 0){
                  //alert('Campo esta preenchido');      
                  $.ajax({
                 /* para mandar uma requisiçao  para mandar uma requisição sem mudar a paisna
                 é para ser pasado os valor que vem do banco data: {chave1:valor1,}*/
                 /* no luga junto do data  { texto_tweet: $('#texto_tweet').val() },
                 a função serialize permite você abrir um formulario na mesma paisna  */
                 url:'get_pessoas.php', method:'post',
                 data: $('#form_procurar_pessoas').serialize(),
                 success:function(data) {
                 	// para linpa o campo
                 	$('#nome_pessoa').val('');
                 	$('#pessoas').html(data);
                 	//o . é por que é por cllas
                 	$('.btn_seguir').click(function(){      
                     //this botao clickado e papitura
                     var id_usuario = $(this).data('id_usuario');

                    //alert(id_usuario);
                       //metodo ajax para passa id pelo botao procura pessoas
                       $.ajax({

                       	url:'seguir.php', method:'post',
                       	data: { seguir_id_usuario: id_usuario },
                       	success:function(data){
                       		//alert(data);
                       		alert('requisição efetuada com sucesso !');
                       	}


                       });

                   });

                 }

             });

              }


          });



    });

</script>

</head>
<body>

	<!-- Static navbar -->
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<img src="imagens/icone_twitter.png" />
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="home.php">Home</a></li>
					<li><a href="sair.php">Sair</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>


	<div class="container">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h4> <?= $_SESSION['usuario']?></h4>

					<hr/>
					<div class="col-md-6">
						TWEETS<br/> 1
					</div>
					<div class="col-md-6">
						SEGUIDORES <br/> 1
					</div>
				</div>	
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<form id="form_procurar_pessoas" class="input-group">
						<input type="text" class="form-control" name="nome_pessoa" placeholder=" Quem você ta procurando?" id="nome_pessoa" maxlength="140"/>
						<span class="input-group-btn "> 
							<button class="btn btn-default" id="btn_procurar_pessoa" type="button"> Procurar</button>
						</span>
					</form>
				</div>
			</div>


			<div id="pessoas" class="list-group">
				<!--div para atualizar tweets--> 	


			</div>




		</div>
		<div class="col-md-3">
			<div class="penel penel-default">
				<div class="panel-body">

				</div>
			</div>
		</div>


	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



</body>
</html>

























