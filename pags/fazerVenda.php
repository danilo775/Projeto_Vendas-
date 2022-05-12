<?php
	include_once "../include/conecta.php";

		$result = pg_query($conecta, "SELECT * FROM produto ");
		if(!$result){
			die("Falha a consultar Produtos: " . pg_last_error());
		}		
	
?>


<!doctype html>
<html>
	<head>
		<title>Vendas</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
		<link rel="stylesheet" href="css/base.css">
        <script src="../js/createRequest.js"></script>
	    <script src="../js/methods.js"></script>

	</head>
	<body>
		<div class="container">
		
			<form action="../action/addVenda.php" method="GET" >
				<fieldset>
					<legend><h1>Fazer Venda</h1></legend>
					
					<input type="hidden" value="<?php echo $_REQUEST['codigo'] ?>"  name="cliente" id="cliente">
                    
          
                    <div class="form-group">
                        <table class="table" id="tableProduto">
                            <tr>

                          
                                
                                <th>
                                    <label> Produto</label>
                                    <select class="form-control"   name="produto[]" id="produto">
                                        <?php
                                            while($row = pg_fetch_array($result)){
                                        ?>
                                        <option value = "<?php echo $row['codigo'];?>"  >
                                            <?php echo $row['descricao']; $pro = $row['descricao']; ?>
                                        </option>
                                        <?php } ?>				
                                    </select> 
                                </th>

                                <th> 
                                        <label>Quantidade</label>
                                        <input type="text"  class="form-control" maxlength="15" name="quantidade[]" id="quantidade">			 
                                </th>

                                <th>
                                    <label>Valor</label>
                                    <input type="text"  class="form-control" maxlength="15" name="valor[]" id="valor"  onkeyup="formatarMoeda(this);">	
                                </th>

                                <th>
                                <label>Adicionar Produto</label>
                                <input type="button" class="btn btn-default form-control" value="ADD" onclick="addProduto(produto.value,quantidade.value,valor.value)">
                                </th>
                                
                            </tr>
                            <tr >
                                <th>Codigo</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>valor</th>
                            </tr> 
                          
                           
                        <table>    			
					</div>
                     <br>                             
                   <hr>
                   <br>                            
                    <div class="form-group">
                        <div class="row ">
                            <div class="form-group col">
                                <label> data_pagamento</label>
                                <input type="date" class="form-control" maxlength="15" name="data_pagamento" id="data_pagamento">
                            </div>				
                            
                            <div class="form-group col">
                                <label for="type">Tipo de Venda</label>
                                <select class="form-control" maxlength="15" name="tipo" id="tipo">
                                    <option value="1">A vista</option>
                                    <option value="2">A prazo</option>
                                </select>
                            </div>								
                        </diV>
                        <div class=" row ">

                            <div class="form-group col">
                                <label>Desconto</label>
                                <input type="text"  class="form-control" maxlength="15" name="desconto" id="desconto"  onkeyup="formatarMoeda(this);">			
                            </div>

                            <div class="form-group col">
                                <input type="submit" class="btn btn-default" value="CONCLUIR VENDA">
                                <span id="msg"></span>
                            </div>
                        </div>   
                   </div>			
                </fieldset>
        </form>
		</div>
	</body>
</html>