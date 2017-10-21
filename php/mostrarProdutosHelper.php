<?php
	require 'database.php';
	
	function pegarProdutos(){
		return query("SELECT nome, valor, imagem FROM produto");
	}
?>