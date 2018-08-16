<?php




class banco {


	private $host = 'localhost';

	private $usuario ='root';

	private $senha = '';

	private $database = 'clone';


	public function conecta_mysql(){
// criando a conexao
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
// ajustar o charset de comunicação entre a aplicação e o banco de  dados
		mysqli_set_charset($con , 'utf8');

// verificar se hover erro de coexao

		if(mysqli_connect_errno()){
			echo 'erro na conexao do banco de dados:'.mysql_connect_errno();
		}


      return $con;


	}

}







?>