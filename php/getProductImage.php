<?php
	require 'database.php';
	$query = query("SELECT imagem FROM produto WHERE id={$_GET['id']}");
	$row = mysqli_fetch_array($query);
	header('Content-Type:image/jpeg');
	echo $row['imagem'];
?>