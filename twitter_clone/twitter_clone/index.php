<?php
/*
 recupera 
 if ternario  para pestar o que vai ser utilizado na tela
 sem mostra o codigo se */


 $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;


 ?>

 <!DOCTYPE HTML>
 <html lang="pt-br">
 <head>
 	<meta charset="UTF-8">

 	<title>Twitter clone</title>

 	<!-- jquery - link cdn -->
 	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

 	<!-- bootstrap - link cdn -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

 	<script>
 		$(document).ready( function(){
			// verificar se os campo de usuario e senha foram devidadmente prenchidos
			$('#btn_login').click(function(){
 				//para arfimar que é falso 

 				var campo_vasio = false;

 				if($('#campo_usuario').val()==''){
                 //para mudar a cor do campo 
                 $('#campo_usuario').css({'border-color':'#A94442'});      
                 campo_vasio = true;

                   /*  para dar um alerta
                   alert('campo usuario está vazio');
                   var campo_vasio = true;*/
               }else{
               	$('campo_usuario').css({'border-color':'#ccc'});
               }

               if($('#campo_senha').val()==''){

               	$('#campo_senha').css({'border-color':'#A94442'});
               	campo_vasio = true;
 			/*alert('campo senha está vazio');
 			var caompo_vasio = true;*/

 		}else{
 			
 			$('campo_senha').css({'border-color':'#ccc'});
 		}
 		if (campo_vasio) return false;

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
					<li><a href="inscrevase.php">Inscrever-se</a></li>

					<li class="<?= $erro == 1 ?  'open':''?>">

						<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
						<ul class="dropdown-menu" aria-labelledby="entrar">
							<div class="col-md-12">
								<p>Você possui uma conta?</h3>
									<br />
									<form method="post" action="validar_acesso.php" id="formLogin">
										<div class="form-group">
											<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
										</div>

										<div class="form-group">
											<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
										</div>

										<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

										<br /><br />

									</form>
									<?php
                                        //testa variavel = 1 
									if($erro == 1){
										echo '<font  color= "#FF0000">usuario ou senha invalido(s)</font>';
									}

									?>

								</form>
							</ul>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>


		<div class="container">

			<!-- Main component for a primary marketing message or call to action -->
			<div class="jumbotron">
				<h1>Bem vindo ao twitter clone</h1>
				<p>Veja o que está acontecendo agora...</p>
			</div>

			<div class="clearfix"></div>
		</div>


	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>