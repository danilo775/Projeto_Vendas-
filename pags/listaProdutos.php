 <?php

 include_once "../include/conecta.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="../js/createRequest.js"></script>
	<script src="../js/methods.js"></script>
	<link rel="stylesheet"  type="text/css" href="../css/lista.css">
</head>
<body id="">
	<div class="corpo1">
	<div class="corpo">

		<div class="menu">
			<?php 	include_once "./menu.php";?>
		</div>
		<hr>
		<div class="busca">
			<div >
				<legend id="legenda"> <h1> Produtos </h1></legend>
			</div >
			<div class="form-group">
				<input class="form-control " type="search" placeholder="Buscar Produtos" >
		
			</div>
		</div>
		<br>
		<?php
			$result = pg_query($conecta, "SELECT * FROM produto ORDER BY descricao");
			if(!$result){
				die("Falha ao listar Produtos: " . pg_last_error());
			}
			if(pg_num_rows($result)>0){
		?>
		<table class="table">
			<tr>
				<th>Codigo</th>
				<th>Descrção</th>
				<th>Preço a Vista</th>
				<th>Preço a Vista</th>
				<th>Preço a prazo</th>
				<th>Quantidade</th>
				
			</tr>
			<?php
				while( $row = pg_fetch_array($result)){		
			?>
				<tr>
					<td> <?php echo $row['codigo']; ?> </td>
					<td> <?php echo $row['descricao']; ?> </td>
					<td> <?php echo $row['preco_custo']; ?> </td>
					<td> <?php echo $row['preco_vista']; ?> </td>
					<td> <?php echo $row['preco_prazo']; ?> </td>
					<td> <?php echo $row['quantidade']; ?> </td>
					
					<td>
					 <a href="./atualizaProduto.php?codigo=<?php echo $row["codigo"]; ?>"> <img src="../img/editar.png" class="imgCliente"> </a> 
					 <a href="../action/deletaProduto.php?codigo=<?php echo $row["codigo"]; ?>"> <img src="../img/deletar.png"class="imgCliente"> </a>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>					
</body>
</html>