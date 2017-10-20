<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Adicionar Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-2">
		</div>	
		<div class="col-md-8" style="margin-top: 100px">
			<h3 align="center">Adicionar Produto</h3>	
			<hr>
			<?php
				require 'php/adminHelper.php';
				if (!empty($_POST) && AdicionarProduto($_POST, $_FILES['imagem']['tmp_name'])){
					echo "<div class='alert alert-success'>
						<strong>Feito!</strong> Produto adicionado com sucesso.
					</div>";
				}
				echo mysqli_error($GLOBALS['conexao']);
			?>
			<form action="AdicionarProdutos.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" placeholder="Nome do Produto" class="form-control" name="nome" required \>
				</div>
				<div class="form-group">
					<input type="number" placeholder="Valor do Produto" class="form-control" name="valor" step=".01" required \>
				</div>
				<div class="form-group form-control">
					<div class="row">
						<div class="col-md-1">
							<p>Imagem: </p>
						</div>
						<div class="col-md-11" style="left: 15px">
							<input type="file" accept="image/*" name="imagem" required \>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-block">ADICIONAR</button>
				</div>
			</form>
			<div class="form-group">
				<a href="VisualizarProdutos.php" style="text-decoration: none">
					<button type="submit" class="btn btn-primary btn-block">VER PRODUTOS</button>
				</a>
			</div>
			<hr>
		</div>
		<div class="col-md-2">
		</div>			
	</div>
	</div>
</body>
</html>