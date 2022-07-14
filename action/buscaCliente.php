 <?php
 include_once "../include/conecta.php";
?>

		<?php

			$busca = $_REQUEST['busca'];
			if(isset($busca) && $busca == "")
			{
				$result = pg_query($conecta, "SELECT * FROM cliente 	
				ORDER BY nome");
			}
			else{
				$result = pg_query($conecta, "SELECT * FROM cliente 
				WHERE nome ILIKE '%$busca%'
				ORDER BY nome");
			}
			
			if(!$result){
				die("Falha ao listar Clientes: " . pg_last_error());
			}
			if(pg_num_rows($result)>0){
		?>
		<table class="table" id="tableyy">
			<tr class="x">
				<th>Nome</th>
				<th>Endereço</th>
				<th>Numero</th>
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
			die("Nao HA Cliente Cadastrado" . pg_last_error($conecta));
		} ?>
		</table>
		
