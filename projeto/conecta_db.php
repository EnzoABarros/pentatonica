<?php
	function conecta_db(){
		$db_name = "db_pentatonica";
		$user    = "root";
		$pass    = "1234";

		// ALTERAR A PORTA CONFORME O COMPUTADOR QUE ESTEJA INSTALADO
		$port    = "3308";
		$server  = "localhost:".$port;
		// ---------------------------------------------------------------

		
		$conexao = new mysqli($server, $user, $pass, $db_name);
		
		if ($conexao->connect_error) {
			die("Erro na conexão: " . $conexao->connect_error);
		}

		return $conexao;
		}
?>