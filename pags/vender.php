<?php
		session_start();
		include_once "../include/conecta.php";

		$result = pg_query($conecta, "SELECT * FROM produto ");
		if(!$result){
			die("Falha a consultar Produtos: " . pg_last_error());
		}		
	
?>


<!doctype html>
<html>
	<head>
		<title>Vendas</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
		<link rel="stylesheet" href="css/base.css">
        <script src="js/createRequest.js"></script>
	    <script src="js/methods.js"></script>

	</head>
	<body>
		<div class="container">
		
			<form action="../action/addVenda.php" method="GET" >
				<fieldset>
					<legend>Fazer Venda</legend>
					
					<input type="hidden" value="<?php echo $_REQUEST['codigo'] ?>"  name="cliente" id="cliente">	

					<div  class="form-group">
						<label> Produto</label>
						<select class="form-control" maxlength="15"  name="produto" id="produto">
							<?php
								while($row = pg_fetch_array($result)){
							?>
							<option value = "<?php echo $row['codigo'];?>" >
								<?php echo $row['descricao'];?>
							</option>
							<?php } ?>				
						</select>
					</div>
					
					<div class="form-group">
						<label>Valor</label>
						<input type="text"  class="form-control" maxlength="15" name="valor" id="valor"  onkeyup="formatarMoeda(this);">			
					</div>

                    <div class="form-group">
						<label>Desconto</label>
						<input type="text"  class="form-control" maxlength="15" name="desconto" id="desconto"  onkeyup="formatarMoeda(this);">			
					</div>

                    <div class="form-group">
						<label>Quantidade</label>
						<input type="text"  class="form-control" maxlength="15" name="quantidade" id="quantidade">			
					</div>
					
					<div class="form-group">
						<label> data_pagamento</label>
						<input type="date" class="form-control" maxlength="15" name="data_pagamento" id="data_pagamento">
					</div>				
					
					<div class="form-group">
						<label for="type">Tipo de Venda</label>
						<select class="form-control" maxlength="15" name="tipo" id="tipo">
							<option value="1">A vista</option>
							<option value="2">A prazo</option>
						</select>
					</div>								
					
					<input type="submit" class="btn btn-default" value="CONCLUIR VENDA">
					<span id="msg"></span>
				</fieldset>
			</div>
		</form>
	</body>
</html>