 <?php
	session_start();
	include_once "../include/conecta.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de Clientes</title>
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
				<legend id="legenda"> <h1> Lista de Clientes </h1></legend>
			</div >
 			<div class="form-group">
			 <input class="form-control " type="search" placeholder="Buscar Clientes" id="buscado" onkeyup ="buscaCliente()">
     
			</div>
		</div>
		<br>
		<div id="tableBusca">
		<?php
			$result = pg_query($conecta, "SELECT * FROM cliente ORDER BY nome");
			if(!$result){
				die("Falha ao listar Clientes: " . pg_last_error());
			}
			if(pg_num_rows($result)>0){
		?>
		
			<table class="table" id="tableyy">
				<tr class="x">
					<th>Nome</th>
					<th>Endereço</th>
					<th>Número</th>
					<th>Celular</th>
					<th>Bairro</th>
					<th>Cidade</th>
					<th>Mais Informações</th>
					<th></th>
				</tr>
				<?php
					while( $row = pg_fetch_array($result)){		
				?>
				<tr>
					<td> <?php echo $row['nome']; ?> </td>
					<td> <?php echo $row['endereco']; ?> </td>
					<td> <?php echo $row['numero']; ?> </td>
					<td> <?php echo $row['celular']; ?> </td>
					<td> <?php echo $row['bairro']; ?> </td>
					
					<td> <?php echo $row['cidade']; ?> </td>
					<td> <?php echo $row['mais_informacoes']; ?> </td>
					<td style="text-align:center;">
					<a href="./fazerVenda.php?codigo=<?php echo $row["codigo"]; ?>"> <img src="../img/vender.png"class="imgCliente  me-3 "> </a>
					<a href="./atualizaCliente.php?codigo=<?php echo $row["codigo"]; ?>"> <img src="../img/editar.png" class="imgCliente  me-3 "> </a> 
					<a href="../action/deletaCliente.php?codigo=<?php echo $row["codigo"]; ?>"> <img src="../img/deletar.png"class="imgCliente  me-3" onclick="return confirm('Deseja remover este cliente?')"> </a>
					<a href="./listaVenda.php?codigo=<?php echo $row["codigo"]; ?>"> <img src="../img/paga.png"class="imgCliente"> </a>
					</td>
					</td>
				</tr>
								
				<?php } ?>
			<?php 
			}else{
				die("Nao HA Cliente Cadastrado" . pg_last_error());
			} ?>
			</table>
		</div>
		<div class="footer">
			<?php 	include_once "./footer.php";?>
		</div>
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>			
</body>
</html>