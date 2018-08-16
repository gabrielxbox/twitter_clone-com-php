<?php
// a qui tras a ssession dos dados para essa paisna e mostra la em baixo
session_start();
// verifica a seesion para retorna a paisna 
if(!isset($_SESSION['usuario'])){
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
        $('#btn_tweet').click(function(){
      // o comando length conta quantas palavras tem e compara
      if($('#texto_tweet').val().length > 0){
                  //alert('Campo esta preenchido');      
                  $.ajax({
                 /* para mandar uma requisiçao  para mandar uma requisição sem mudar a paisna
                 é para ser pasado os valor que vem do banco data: {chave1:valor1,}*/
                 /* no luga junto do data  { texto_tweet: $('#texto_tweet').val() },
                 a função serialize permite você abrir um formulario na mesma paisna  */
                 url:'inclui_tweet.php', method:'post',
                 data: $('#form_tweet').serialize(),
                 success:function(data) {
                 	// para linpa o campo
                 	$('#texto_tweet').val('');
                 	atualizaTweet();
                 	//alert('tweet incruido com sucesso !!');
                 }

             });

              }


          });
       // função para atualizar a div de tweet
       function atualizaTweet(){
        	//para carregar os tweets
        	$.ajax({
        		url:'get_tweet.php',
        		success:function(data){
         		// recupera a div e passa a fuçao html
         		$('#tweets').html(data);
         		//alert(data);
         	}
         });

        }       
//chamando a função
atualizaTweet();


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
					<form id="form_tweet" class="input-group">
						<input type="text" class="form-control" name="texto_tweet" placeholder="O que está acontecendo agora?" id="texto_tweet" maxlength="140"/>
						<span class="input-group-btn "> 
							<button class="btn btn-default" id="btn_tweet" type="button"> Tweet</button>
						</span>
					</form>
				</div>
			</div>


			<div id="tweets" class="list-group">
				<!--div para atualizar tweets--> 	


			</div>




		</div>
		<div class="col-md-3">
			<div class="penel penel-default">
				<div class="panel-body">
					<h4><a href="procurar_pessoas.php">Procura por pessosas</a> </h4>
				</div>
			</div>
		</div>


	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



</body>
</html>