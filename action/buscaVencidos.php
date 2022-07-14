<?php
    include_once "../include/conecta.php";

    $busca = $_REQUEST['busca'];
    if(isset($busca) && $busca == "")
    {
        $result = pg_query($conecta, "SELECT cliente.codigo, cliente.nome, venda.valor, venda.data_venda, venda.data_vencimento,venda.codigo as venda
        FROM cliente , venda 
        WHERE cliente.codigo = venda.cliente 
        AND venda.tipo = 2 
        AND CURRENT_DATE >= data_vencimento ORDER BY nome, data_vencimento");
    }
    else{
        $result = pg_query($conecta, "SELECT cliente.codigo, cliente.nome, venda.valor, venda.data_venda, venda.data_vencimento,venda.codigo as venda
        FROM cliente , venda 
        WHERE cliente.codigo = venda.cliente 
        AND venda.tipo = 2 
        AND CURRENT_DATE >= data_vencimento 
        AND cliente.nome ILIKE '%$busca%'
        ORDER BY nome, data_vencimento");
    }

    if(!$result){
        die("Falha ao listar produtos: " . pg_last_error($conecta));
    }
    if(pg_num_rows($result)>0){
?>
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
				<td> <?php echo $row['valor']; ?> </td>
				<td> <?php echo $row['data_venda']; ?> </td>
				<td> <?php echo $row['data_vencimento']; ?> </td>
				
				<td style="text-align:center;">
				<a href="./pagamento.php?codigo=<?php echo $row["venda"]; ?>&cliente=<?php echo $row["codigo"]; ?>"> <img src="../img/paga.png"class="imgCliente "> </a>	
				</td>
			</tr>
							
			<?php } ?>
		<?php 
		}else{
			die(" Cliente não encontrado" . pg_last_error($conecta));
		} ?>
		</table>