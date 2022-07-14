<?php

    include_once "../include/conecta.php";
   
    $busca = $_REQUEST['busca'];
    if(isset($busca) && $busca == "")
    {
        $result = pg_query($conecta, "SELECT * FROM produto 	
        ORDER BY descricao");
    }
    else{
        $result = pg_query($conecta, "SELECT * FROM produto 
        WHERE descricao ILIKE '%$busca%'
        ORDER BY descricao");
    }

    if(!$result){
        die("Falha ao listar produtos: " . pg_last_error());
    }
    if(pg_num_rows($result)>0){
?>
    
    <table class="table">
        <tr class="x">
            <th>Codigo</th>
            <th>Descrção</th>
            <th>Preço a Vista</th>
            <th>Preço de Custo</th>
            <th>Preço a prazo</th>
            <th>Quantidade</th>
            <th>
            
            </th>
        </tr>
        <?php
            while( $row = pg_fetch_array($result)){		
        ?>
            <tr>
                <td> <?php echo $row['codigo']; ?> </td>
                <td> <?php echo $row['descricao']; ?> </td>
                <td> <?php echo str_replace(".", ",", $row['preco_custo']); ?> </td>
                <td> <?php echo str_replace(".", ",", $row['preco_vista']); ?> </td>
                <td> <?php echo str_replace(".", ",", $row['preco_prazo']); ?> </td>
                <td> <?php echo $row['quantidade']; ?> </td>
                
                <td style="text-align:center;">
                <a href="./atualizaProduto.php?codigo=<?php echo $row["codigo"]; ?>"> <img src="../img/editar.png" class="imgCliente me-3 "> </a> 
                <a href="../action/deletaProduto.php?codigo=<?php echo $row["codigo"]; ?>"> <img src="../img/deletar.png"class="imgCliente"> </a>
                </td>
            </tr>
           
        <?php } ?>
       <?php 
       }else{
           die("Nao HA Produto Cadastrado" . pg_last_error($conecta));
       } ?>
       </table>
      