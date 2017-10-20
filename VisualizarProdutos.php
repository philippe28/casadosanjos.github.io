<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Visualizar Produtos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="modal fade" role="dialog" id="confirm">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Confirmação</h3>
				</div>
				<div class="modal-body">
					<p>Tem certeza que deseja excluir este produto?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-md btn-defautl" data-toggle="modal" data-target='#confirm'>CANCELAR</button>
					<button class="btn btn-md btn-info">CONFIRMAR</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
			</div>	
			<div class="col-md-8" style="margin-top: 100px">
				<div class="row">
					<div class="col-md-2" style="position:absolute;z-index:1">
						<a href="AdicionarProdutos.php">
							<button class="btn btn-info"><i class="fa fa-undo"></i> Voltar</button>
						</a>
					</div>
					<div class="col-md-12">
						<h3 align="center">Visualizar Produtos</h3>
					</div>
				</div>
				<hr>
					<?php
						require 'php/adminHelper.php';
						if (!empty($_POST) && ExcluirProduto($_POST['id'])){
							echo "<div class='alert alert-success'>
									<strong>Feito!</strong> Produto excluido com sucesso.
								</div>";
						}
					?>
					<div class="table-responsive">          
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Preço</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$query = query("SELECT * FROM produto");
									while ($row = mysqli_fetch_assoc($query)){
										echo "  <tr>";
										echo "      <td>{$row['id']}</td>";
										echo "      <td>{$row['nome']}</td>";
										echo "      <td>{$row['valor']}</td>";
										echo "      <td>
														<form action='VisualizarProdutos.php' method='post'>
															<input type='hidden' name='id' value='{$row['id']}'>
															<button id='btnDelete' data-toggle='modal' data-target='#confirm' class='btn btn-sm btn-danger btn-block'>EXCLUIR</button>
														</form>
													</td>";
										echo "  </tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				<hr>
			</div>
			<div class="col-md-2">
			</div>			
		</div>
	</div>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="js/modalconfirm.js"></script>
</html>