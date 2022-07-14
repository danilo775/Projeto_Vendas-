<?php
 include_once "../include/conecta.php";
	if(isset($_GET["cliente"])){
		$cliente = $_GET["cliente"];
	}	
	$result1 = pg_query($conecta, "SELECT *
	FROM cliente 
	WHERE  cliente.codigo = $cliente");

	$linha = pg_fetch_array($result1);
	?>
?>

<!DOCTYPE html>
<html>
<head>
	<title>Clientes </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet"  type="text/css" href="../css/pagamento.css">

</head>
<body  onload="">
	<div class="corpo1">
	<div class="corpo">
		<div class="menu">
			<?php 	include_once "./menu.php";?>
		</div>

 		<div class="busca  mt-3">	 	
			<legend id="legenda"> <h1> Pagamento </h1></legend>
				<h5 class="nome"> Cliente: <?php echo $linha['nome']?> </h5>
		</div>
		<br>
		<div class="cor_fundo">
			<div class=" row mt-2" >
			<div class="form-group col">
					<label>Data de Pagamento</label>
					<input type="date"  class="form-control mt-2" maxlength="15" name="data_pagamento" id="data_pagamento" value='<?php echo date("Y-m-d"); ?>'>          
				</div>
				<div class="form-group col">
					<label>Valor a Pagar</label>
					<input type="text"  class="form-control mt-2" maxlength="15" name="valor_pago" id="valor_pago" onkeyup="formatarMoeda(this);">			
				</div>
				<div class="form-group col">
				<label for="type">Pagamento/Operacão</label>
					<select class="form-select mt-2" name="tipo_operacao" id="tipo_operacao">
						<option value="1">Dinheiro</option>
						<option value="2">Cartão</option>
						<option value="3">Pix</option>
					</select>					
				</div>
				
			</div>   
			<div class="form-group col mt-4">
				<button id ="bt" type="button" class="btn btn-dark btn-sm"  onclick="submeteFormulario()" > Concluir Pagamento </button>
				<span id="msg"></span>
			</div>
			
		</div>
		<?php
           if(isset($_GET["codigo"])){
                $codigo = $_GET["codigo"];
            }	
			$result = pg_query($conecta, "SELECT cliente.codigo, venda.codigo AS codvenda, pagamento.* 
			FROM cliente , venda ,pagamento
			WHERE cliente.codigo = $cliente
			AND  venda.codigo = $codigo
			AND pagamento.venda = venda.codigo
			ORDER BY pagamento.data_pagamento ");
			
			if(!$result){
				die("Falha ao listar Clientes: " . pg_last_error());
			}
			if(pg_num_rows($result)>0){
		?>
		<table class="table mt-5" id="tablePagamento">
			<tr class="x">		
				<th>Data do Pagamento</th>
				<th>Valor Pago</th>
				<th>Tipo de Pagamento</th>				
			</tr>
			<?php
				while( $row = pg_fetch_array($result)){					
					$codvenda =	$row["codvenda"];
			?>
			<tr>
				<td> <?php echo $row['data_pagamento']; ?> </td>
				<td id="cor_valor"> <?php echo $row['valor_pago']; ?> </td>
				<td> 
					<?php 
						switch($row['tipo_operacao']){
							case "1": echo 	"Dinheiro"; break;
							case "2": echo 	"Cartão"; break;
							case "3": echo 	"Pix"; break;
						}
					?> 
				</td>			
			</tr>
							
			<?php } ?>
		<?php 
		}else{
			echo "Nao ha Pagamento desse Cliente" ;
		} ?>
		</table>
		
		<input type="hidden" id="venda" name="venda" value="<?php echo $codigo; ?>">
	</div>
	</div>
	<script src="../js/createRequest.js"></script>
	<script src="../js/methods.js"></script>
	<script src="../js/pagamento.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>			
</body>
</html>