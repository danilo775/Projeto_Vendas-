<?php
	session_start();
	if(isset($_SESSION['conectado']) &&  $_SESSION['conectado'] == true )
	{
		header("Location: ./listaClientes.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/base.css">
	<script src="../js/createRequest.js"></script>
	<script src="../js/methods.js"></script>

</head>
<body id="a">
	<div id="area">
	<div class="area">
		<form action="../action/login.php" method="POST"  >
			
					<legend>  <h1>Login do Sistema</h1> </legend>
			
					<div class="form-group">
						<label for="user">Usuario</label>
						<input type="text" id="user" name="user" class="form-control">	
					</div>
				
					<div class="form-group">
						<label for="senha" > Senha </label>	
						<input type="password" id="senha" name="senha" class="form-control">
					</div>

				
					<div class="form-group">	
					<button type="button"  name="bt"  class="btn btn-default" id="bt"  onclick=" addLogin();">ENTRAR </button>
					</div>
					<span id="msg"></span>
			
		
		</form>
	</div>	
	</div>
</body>
</html>