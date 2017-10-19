<?php
	require 'database.php';
	
	function AdicionarProduto($valores, $imagem){
		$imagem = mysqli_real_escape_string($GLOBALS['conexao'], file_get_contents($imagem));
		return query("INSERT INTO produto VALUES(default, '{$valores['nome']}', '{$imagem}', '{$valores['valor']}')");
	}
	
	function ExcluirProduto($id){
		return query("DELETE FROM produto WHERE id=$id");
	}
?>