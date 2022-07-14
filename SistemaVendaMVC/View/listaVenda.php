<?php
 include_once "../include/conecta.php";
	if(isset($_GET["codigo"])){
		$codigo = $_GET["codigo"];
	}	
	$result1 = pg_query($conecta, "SELECT *
	FROM cliente 
	WHERE  cliente.codigo = $codigo");
	$linha = pg_fetch_array($result1);
	   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Clientes </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet"  type="text/css" href="../css/pagamento.css">

</head>
<body  onload="calculaValorTotal()">
	<div class="corpo1">
	<div class="corpo">
		<div class="menu">
			<?php 	include_once "./menu.php";?>
		</div>

 		<div class="busca  mt-3">	 	
			<legend id="legenda"> <h1> Lista de Compras </h1></legend>
			<h5 class="nome"> Cliente: <?php echo $linha['nome']?> </h5>
		</div>
		<br>
		
		<?php
           if(isset($_GET["codigo"])){
                $codigo = $_GET["codigo"];
            }	
			$result = pg_query($conecta, "SELECT * ,(venda.valor - coalesce(valor_pago, 0)) AS saldo_devedor FROM venda LEFT OUTER JOIN (SELECT venda, coalesce(sum(valor_pago), 0) AS valor_pago FROM pagamento GROUP BY venda) AS pagVenda
			ON venda.codigo = venda
			WHERE venda.cliente = '$codigo' AND tipo ='2'");
			
			if(!$result){
				die("Falha ao listar Clientes: " . pg_last_error());
			}
			if(pg_num_rows($result)>0){
		?>
		<table class="table " id="tablePagamento">
			<tr class="x">		
				<th>Data da Venda</th>
				<th>Valor</th>
				<th>Valor Pago</th>
				<th>Saldo Devedor</th>
				<th>Data de Vencimento</th>	
                <th></th>			
			</tr>
			<?php
				while( $row = pg_fetch_array($result)){		
			?>
			<tr>
				<td> <?php echo $row['data_venda']; ?> </td>
				<td id="cor_valor"> <?php echo $row['valor']; ?> </td>
				<td> <?php echo $row['valor_pago']; ?> </td>
				<td> <?php echo $row['saldo_devedor']; ?> </td>
				<td> <?php echo $row['data_vencimento']; ?> </td>	
                <td style="text-align:center;"> <a href="./pagamento.php?codigo=<?php echo $row["codigo"];?>&cliente=<?php echo $linha["codigo"];?> "> <img src="../img/paga.png"class="imgCliente"> </a> </td>		
			</tr>
							
			<?php } ?>
		<?php 
		}else{
			echo "Nao HA Compras desse Cliente" ;
		} ?>
		</table>
			
	</div>
	</div>
	<script src="../js/createRequest.js"></script>
	<script src="../js/methods.js"></script>
	<script src="../js/pagamento.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>			
</body>
</html>