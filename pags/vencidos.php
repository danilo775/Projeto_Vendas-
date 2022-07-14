<?php
	session_start();
 	include_once "../include/conecta.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Vencidos </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="../js/createRequest.js"></script>
	<script src="../js/busca.js"></script>
	<script src="../js/methods.js"></script>
	<link rel="stylesheet"  type="text/css" href="../css/lista.css">

</head>
<body id="">
	<div class="corpo1">
	<div class="corpo">
		<div class="menu">
			<?php 	include_once "./menu.php";?>
		</div>

 		<div class="busca">
		 	<div >
				<legend id="legenda"> <h1> Lista de Devedores </h1></legend>
			</div >
 			<div class="form-group">
			 <input class="form-control " type="search" placeholder="Buscar Clientes" id="buscado" onkeyup="buscaVencidos();" >
     
			</div>
		</div>
		<br>
		<?php
			
			$result = pg_query($conecta, "SELECT cliente.codigo, cliente.nome, venda.valor, venda.data_venda, venda.data_vencimento,venda.codigo as venda
			FROM cliente , venda 
			WHERE cliente.codigo = venda.cliente 
			AND venda.tipo = 2 
			AND CURRENT_DATE >= data_vencimento ORDER BY nome, data_vencimento");
			
			if(!$result){
				die("Falha ao listar Clientes: " . pg_last_error());
			}
			if(pg_num_rows($result)>0){
		?>
		<div id="tableBusca">    
			<table class="table" id="tableyy">
				<tr class="x">
					
					<th>Nome</th>
					<th>Valor</th>
					<th>Data da Compra</th>
					<th>Vencimento</th>				
					<th></th>
				</tr>
				<?php
					while( $row = pg_fetch_array($result)){		
				?>
				<tr>
				
					<td> <?php echo $row['nome']; ?> </td>
					<td> <?php echo number_format($row['valor'], 2, ',', '.'); ?> </td>
					<td> <?php echo date('d-m-Y', strtotime($row['data_venda'])); ?> </td>
					<td> <?php echo date('d-m-Y', strtotime($row['data_vencimento'])); ?> </td>
					
					<td style="text-align:center;">
					<a href="./pagamento.php?codigo=<?php echo $row["venda"]; ?>&cliente=<?php echo $row["codigo"]; ?>"> <img src="../img/paga.png"class="imgCliente "> </a>	
					</td>
				</tr>
								
				<?php } ?>
			<?php 
			}else{
				die("Nao HA Cliente Cadastrado" . pg_last_error());
			} ?>
			</table>
		</div>
	</div>
	<div class="footer">
			<?php 	include_once "./footer.php";?>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>			
		
</body>
</html>