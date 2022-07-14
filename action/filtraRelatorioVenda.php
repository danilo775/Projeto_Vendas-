<?php
	session_start();
 	include_once "../include/conecta.php";
	 $soma = 0;

     $data_inicio = $_REQUEST['data_inicio'];
     $data_final = $_REQUEST['data_final'];
        
			if(isset($data_inicio) && $data_inicio == "" && isset($data_final) && $data_final == "" )
			{
                $result = pg_query($conecta, "SELECT produto.descricao, SUM(contem.quantidade)as quant , SUM(produto.preco_prazo* contem.quantidade) as total
                FROM  venda, contem, produto 
                WHERE data_venda = CURRENT_DATE
                AND venda.codigo = contem.venda
                AND produto.codigo = contem.produto
                GROUP BY produto.codigo ");
            }
            else{
                $result = pg_query($conecta, "SELECT produto.descricao, SUM(contem.quantidade)as quant , SUM(produto.preco_prazo* contem.quantidade) as total
                FROM  venda, contem, produto 
                WHERE venda.data_venda >= '$data_inicio' AND venda.data_venda <= '$data_final' 
                AND venda.codigo = contem.venda
                AND produto.codigo = contem.produto
                GROUP BY produto.codigo");
            }
						
    if(!$result){
        die("Falha ao filtrar vendas: " . pg_last_error($conecta));
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