<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Casdatro Produto</title>
	<link rel="stylesheet" href="../css/produto.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="../js/createRequest.js"></script>
	<script src="../js/cadastraProduto.js"></script>
	
</head>
<body id="w">
	<div class="corpo1">
	<div class="corpo">
		<?php 	include_once "./menu.php";?>

			<form action="../action/addProduto.php" method="POST">

				<legend id="legenda"><h1>Cadastrar Produto</h1></legend>

			<div class="form-group mt-5">
				<label class="form-label">Descrição</label>
				<input type="text" name="descricao" class="form-control" id="descricao">	
			</div>
			<div class="row">
				<div class="form-group col">
					<label class="form-label">Preço de Custo</label>
					<input type="text" name="preco_custo" class="form-control" id="preco_custo" onkeyup="formatarMoeda(this);">	
				</div>

				<div class="form-group col">
					<label class="form-label">Preço a Vista</label>
					<input type="text" name="preco_vista" class="form-control" id="preco_vista" onkeyup="formatarMoeda(this);">	
				</div>

				<div class="form-group col">
					<label class="form-label">Preço a Prazo</label>
					<input type="text" name="preco_prazo" class="form-control" id="preco_prazo" onkeyup="formatarMoeda(this);">	
				</div>
			</div>
			<div class="form-group col-g6">
				<label class="form-label">Quantidade</label>
				<input type="text" name="quantidade" class="form-control" id="quantidade">	
			</div>
			
			<div class="form-group mt-1" >	
			<button type="button"  name="bt"  class="btn btn-default" id="bt"  onclick=" addProduto();">CADASTRAR </button>
			</div>
					<span id="msg"></span>
		</form>	
		
	</div>
		<div class="mt-5">
			<?php 	include_once "./footer.php";?>
		</div>
	</div>
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
