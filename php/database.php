<?php
	define ('HOST', 'localhost');
	define ('DATABASE', 'bd_casadosanjos');
	define ('USER', 'root');
	define ('PASS', '');
	
	$conexao = mysqli_connect(HOST, USER, PASS, DATABASE);
	
	function query($query){
		return mysqli_query($GLOBALS['conexao'], $query);
	}
?>