

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" href="App/css/cadastraCliente.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="App/js/createRequest.js"></script>
	<script src="App/js/methods.js"></script>
</head>
<body id="w">
	<div class="corpo1">
	<div class="corpo">

		<?php 	include_once "View/menu.php";?>


		<form >
			<legend id="legenda"> <h1> Cadastrar Cliente </h1> </legend>
			
			<input type="hidden" name="class" id="class" value="Cliente">
       		<input type="hidden" name="method" id="method" value="add">

			<div class="form-group">
				<label class="form-label">Nome</label>
				<input type="text" name="nome" class="form-control" id="nome" >
			</div>	
				
			<div class="form-group">
				<label class="form-label">Endereço</label>
				<input type="text" name="endereco" class="form-control" id="endereco">	
			</div>

			<div class="row ">
				<div class="form-group col">
					<label class="form-label">Numero</label>
					<input type="text" name="numero" class="form-control" id="numero">	
				</div>

				<div class="form-group col" >
					<label class="form-label">Celular</label>
					<input type="tel" name="celular" class="form-control" id="celular" maxlength="11">	
				</div>

				<div class="form-group col">
					<label class="form-label">Cidade</label>	
					<input type="text" name="cidade" class="form-control" id="cidade">
				</div>
			</div>

			<div class="row ">
				<div class="form-group col">	
					<label class="form-label">Bairro</label>
					<input type="text" name="bairro" class="form-control" id="bairro">	
				</div>

				<div class="form-group col">
					<label class="form-label">CPF</label>	
					<input type="text" name="cpf" class="form-control" id="cpf" maxlength="11">
				</div>
			</div>
			
			<div class="form-group">
				<label class="form-label">Mais Informações</label>
				<input class="form-control" aria-label="With textarea" name="mais_informacoes" id="mais_informacoes"> </input >	
			</div>

			
			<div class="form-group mt-3">	
				<button type="button"  name="bt"  class="btn btn-default" id="bt"  onclick=" addCliente();">CADASTRAR </button>
			</div>
					<span id="msg"></span>
		</form>
		<div class="mt-5">
			<?php 	//include_once "./footer.php";?>
		</div>
	<div>
	<div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
