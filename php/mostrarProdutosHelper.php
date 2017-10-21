<?php
	require 'database.php';
	
	function pegarProdutos(){
		return query("SELECT id, nome, valor FROM produto");
	}
	
	function retornaProdutos(){
		$produtos = [];
		$resultado = pegarProdutos();
		while ($row = mysqli_fetch_assoc($resultado)){
			$row['imagem'] = "php/getProductImage.php?id=".$row['id'];
			array_push($produtos, $row);
		}
		return $produtos;
	}
	
	$json = json_encode(retornaProdutos());
	
	echo $json;
?>