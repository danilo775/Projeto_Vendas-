<?php
	
	include_once "../include/conecta.php";

		if(isset($_GET['codigo'])) {
			$codigo = $_GET['codigo'];
			$prepare = pg_prepare($conecta,"atlProduto", "SELECT * FROM produto WHERE codigo =$1");
			$result = pg_execute($conecta,"atlProduto", array($codigo));
		}
		if(pg_num_rows($result)==1){
			$linha = pg_fetch_array($result);
		}else{
			die("codigo invalido");
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/produto.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="../js/createRequest.js"></script>
	<script src="../js/cadastraProduto.js"></script>
</head>
<body id="tudo">
	<div class="corpo">
		<?php 	include_once "./menu.php";?>
		<form action="../action/editaProduto.php" method="POST">
			<legend id="legenda"> <h1>Editar dados do Produtos <h1> </legend>

				<input type="hidden" name="codigo" value="<?php echo $linha["codigo"]; ?>">


				<div class="form-group">
					<label class="form-label">Descrição</label>
					<input type="text" name="descricao" class="form-control" id="descricao" value="<?php echo $linha['descricao']; ?> ">	
				</div>
			<div class="row">
				<div class="form-group col">
					<label class="form-label">Preço de Custo</label>
					<input type="text" name="preco_custo" class="form-control" id="preco_custo" onkeyup="formatarMoeda(this);" value="<?php echo $linha['preco_custo']; ?> ">	
				</div>

				<div class="form-group col">
					<label class="form-label">Preço a Vista</label>
					<input type="text" name="preco_vista" class="form-control" id="preco_vista" onkeyup="formatarMoeda(this);" value="<?php echo $linha['preco_vista']; ?> ">	
				</div>

				<div class="form-group col">
					<label class="form-label">Preço a Prazo</label>
					<input type="text" name="preco_prazo" class="form-control" id="preco_prazo" onkeyup="formatarMoeda(this);" value="<?php echo $linha['preco_prazo']; ?> ">	
				</div>
			</div>
			<div class="form-group col-g6">
				<label class="form-label">Quantidade</label>
				<input type="text" name="quantidade" class="form-control" id="quantidade" value="<?php echo $linha['quantidade']; ?> ">	
			</div>
			
			<div class="form-group" >	
			<button type="button"  name="bt"  class="btn btn-default" id="bt"  onclick=" addProduto();">CADASTRAR </button>
			</div>
					<span id="msg"></span>
				
		</form>
	</div>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>		
</body>
</html>		

<?php
	include_once "../include/desconecta.php";
?>
