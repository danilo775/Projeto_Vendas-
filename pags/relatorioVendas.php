<?php
	session_start();
 	include_once "../include/conecta.php";
	 $soma = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Relatório </title>
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

		 	<div class=" mt-3">
				<legend id="legenda"> <h1> Relatório de Vendas por Produto </h1></legend>
			</div >

			<div class="busca row mt-5">  
				<div class="form-group col">
					<input type="date"  class="form-control mt-5 col"  name="data_inicio" id="data_inicio" value='<?php echo date("Y-m-d"); ?>'> 
				</div>

				<div class="form-group col">
					<input type="date"  class="form-control mt-5 col"  name="data_final" id="data_final" value='<?php echo date("Y-m-d"); ?>'> 
				</div>

				<div class="form-group col mt-5">
					<button id ="bt" type="button" class="btn btn-dark btn"  onclick="filtraRelatorioVenda()" > Buscar </button>
					<span id="msg"></span>
				</div>
			</div>
		<br>
		<div id="tableBusca">
		<?php
			
			$result = pg_query($conecta, "SELECT produto.descricao, SUM(contem.quantidade)as quant , SUM(produto.preco_prazo* contem.quantidade) as total
			FROM  venda, contem, produto 
			WHERE data_venda = CURRENT_DATE
			AND venda.codigo = contem.venda
			AND produto.codigo = contem.produto
			GROUP BY produto.codigo ");
		
			
			if(!$result){
				die("Falha ao listar Clientes: " . pg_last_error($conecta));
			}
			if(pg_num_rows($result)>0){
		?>
		    
			<table class="table mt-5" id="tableyy">
				<tr class="x">
					<th>Produto</th>
					<th>Total de Produtos Vendidos</th>
					<th>Valor da soma de todos os Produtos</th>		
					
				</tr>
				<?php
					while( $row = pg_fetch_array($result)){		
				?>
				<tr>
					<td> <?php echo $row['descricao']; ?> </td>	
					<td> <?php echo $row['quant']; ?> </td>	
					<td> <?php echo str_replace(".", ",", $row['total']); ?> </td>
					<?php $soma += floatval($row['total']);	?>										
				</tr>
								
				<?php } ?>
			<?php 
			}else{
				die("Venda não encontrada" . pg_last_error($conecta));
			} ?>
				<tr>
					<td colspan="2" id="totalVenda"> Total das Vendas </td>					
					<td> <?php echo  number_format($soma, 2, ",", "."); ?> </td>		
				</tr>
			</table>
		</div>
	</div>
		<div class="mt-5">
			<?php 	include_once "./footer.php";?>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>					
</body>
</html>