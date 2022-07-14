<?php 
	session_start();
?>	
<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" href="../css/produto.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="../js/createRequest.js"></script>
	<script src="../js/methods.js"></script>
	
</head>
<body id="w">
	<div class="corpo1">
	<div class="corpo">
		<?php 	include_once "./menu.php";?>

			<form  method="POST">

				<legend id="legenda"><h1>Atualizar senha</h1></legend>

			<div class="form-group mt-5">
				<label class="form-label">Nome de usuario</label>
				<input type="text" name="descricao" class="form-control" id="descricao" value="<?php echo $_SESSION['usuario']?>" readonly>	
				<input type="hidden" name="codigo" class="form-control" id="codigo" value="<?php echo $_SESSION['codigo']?>">
			</div>
			<div class="row">
				<div class="form-group col">
					<label class="form-label">Senha Antiga</label>
					<input type="password" name="senha_antiga" class="form-control" id="senha_antiga">	
				</div>

				<div class="form-group col">
					<label class="form-label">Nova Senha</label>
					<input type="password" name="senha_nova" class="form-control" id="senha_nova">	
				</div>

				
			</div>
			
			<div class="form-group mt-1" >	
			<button type="button"  name="bt"  class="btn btn-default" id="bt"  onclick=" editaUsuario();">Atualizar </button>
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
