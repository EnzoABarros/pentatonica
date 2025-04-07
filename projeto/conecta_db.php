<?php
	function conecta_db(){
		$db_name = "db_pentatonica";
		$user    = "root";
		$pass    = "1234";
		$server  = "localhost:3307";
		$conexao = new mysqli($server, $user, $pass, $db_name);
		return $conexao;
	}
?>