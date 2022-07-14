<?php
	session_start();
 	include_once "../include/conecta.php";
    $data_inicio = $_REQUEST['data_inicio'];
    $data_final = $_REQUEST['data_final'];
        
			if(isset($data_inicio) && $data_inicio == "" && isset($data_final) && $data_final == "" )
			{
                $result = pg_query($conecta, "SELECT produto.descricao, SUM(contem.quantidade)as quant , SUM(produto.preco_prazo* contem.quantidade) - SUM(produto.preco_custo * contem.quantidade) as custo
                FROM  venda, contem, produto 
                WHERE data_venda = CURRENT_DATE
                AND venda.codigo = contem.venda
                AND produto.codigo = contem.produto
                GROUP BY produto.codigo");
            }
            else{
                $result = pg_query($conecta, "SELECT produto.descricao, SUM(contem.quantidade)as quant , SUM(produto.preco_prazo* contem.quantidade) - SUM(produto.preco_custo * contem.quantidade) as custo
                FROM  venda, contem, produto  
                WHERE venda.data_venda >= '$data_inicio' AND venda.data_venda <= '$data_final' 
                AND venda.codigo = contem.venda              
                AND produto.codigo = contem.produto
                GROUP BY produto.codigo");
            }
						
            if(!$result){
				die("Falha ao listar Clientes: " . pg_last_error($conecta));
			}
			if(pg_num_rows($result)>0){
		?>
		  
			<table class="table mt-5" id="tableyy">
				<tr class="x">	
                    <th>Descrição</th>			
					<th>Total de Lucros</th>				
				</tr>
				<?php
					while( $row = pg_fetch_array($result)){		
				?>
				<tr>
                    <td> <?php echo $row['descricao']; ?> </td>		
					<td> <?php echo str_replace(".", ",",  $row['custo']); ?> </td>												
				</tr>
								
				<?php } ?>
			<?php 
			}else{
				die("Nao HA Cliente Cadastrado" . pg_last_error($conecta));
			} ?>
			</table>
		