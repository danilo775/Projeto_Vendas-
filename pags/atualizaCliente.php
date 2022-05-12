<?php
	session_start();
	include_once "../include/conecta.php";

		if(isset($_GET['codigo'])) {
			$codigo = $_GET['codigo'];
			$prepare = pg_prepare($conecta,"atlCliente", "SELECT * FROM cliente WHERE codigo =$1");
			$result = pg_execute($conecta,"atlCliente", array($codigo));
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
	<title> Atualizar Cliente</title>
	<link rel="stylesheet" href="../css/cadastraCliente.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="../js/createRequest.js"></script>
	<script src="../js/methods.js"></script>
</head>
<body id="tudo">
	<div class="corpo">

		<?php 	include_once "./menu.php";?>

		<form action="../action/editaCliente.php" method="POST" onsubmit="return  validaCliente();">
			<legend id="legenda"> <h1> Editar dados do Cliente </h1> </legend>

			<input type="hidden" name="codigo" value="<?php echo $linha["codigo"]; ?>" class="form-control">

			<div class="form-group">
				<label class="form-label">Nome</label>
				<input type="text" name="nome" value="<?php echo $linha['nome']; ?> " id="nome" class="form-control">	
			</div>

			<div class="form-group">
				<label class="form-label">Endereço</label>
				<input type="text" name="endereco"value="<?php echo $linha['endereco']; ?> " id="endereco" class="form-control">
			</div>

			<div class="row ">
				<div class="form-group col">
					<label class="form-label">Numero</label>
					<input type="text" name="numero"value="<?php echo $linha['numero']; ?> " id="numero" class="form-control">
				</div>

				<div class="form-group col" >
					<label class="form-label">Celular</label>	
					<input type="text" name="celular"value="<?php echo $linha['celular']; ?> " id="celular" class="form-control">
				</div>

				<div class="form-group col">
					<label class="form-label">Cidade</label>	
					<input type="text" name="cidade"value="<?php echo $linha['cidade']; ?> " id="cidade" class="form-control">
				</div>
			</div>

			<div class="row ">
				<div class="form-group col">	
					<label class="form-label">Bairro</label>	
					<input type="text" name="bairro"value="<?php echo $linha['bairro']; ?> " id="bairro" class="form-control">
				</div>

				<div class="form-group col">
					<label class="form-label">CPF</label>	
					<input type="text" name="cpf"value="<?php echo $linha['cpf']; ?> " id="cpf" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
					<label class="form-label">Mais Informações</label>
					<input type="textarea" name="mais_informacoes"value="<?php echo $linha['mais_informacoes']; ?> " id="mais-informacoes" class="form-control">
			</div >
			
			<div class="form-group">
				<input type="submit" name="bt" value="Atualizar" class="btn btn-default" id="bt">
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
