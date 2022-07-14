<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="App/css/base.css">
	<script src="App/js/createRequest.js"></script>
	<script src="App/js/methods.js"></script>

</head>
<body id="a">
	<div id="area">
	<div class="area">
		<form action="../action/login.php" method="POST"  >
			
					<legend>  <h1>Login do Sistema</h1> </legend>
					 <input type="hidden" name="class" id="class" value="Login">
               		 <input type="hidden" name="method" id="method" value="login">
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