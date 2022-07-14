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
		<link rel="stylesheet" href="../css/fazerVenda.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
<body id="w">
	<div class="corpo1">
	<div class="corpo">
        <?php 	include_once "./menu.php";?>
    
        <form action="../action/addVenda.php" method="GET" >

            <fieldset>
                <legend id="legenda"><h1>Fazer Venda</h1></legend>

                <div class="cor">         
                    <div class="form-group mt-3">
                        <div class="row ">
                            <div class="form-group col">
                                <label> Data de Vencimento</label>
                                <input type="date" class="form-control mt-2" maxlength="15" name="data_vencimento" id="data_vencimento" value='<?php echo date("Y-m-d"); ?>'>
                            </div>				
                            
                            <div class="form-group col">
                                <label for="type">Tipo de Venda</label>
                                <select class="form-select mt-2" name="tipo" id="tipo">
                                    <option value="1">A vista</option>
                                    <option value="2">A prazo</option>
                                </select>
                            </div>								
                        </diV>
                        <div class=" row mt-3" >

                            <div class="form-group col">
                                <label>Sub Total</label>
                                <input type="text" readonly class="form-control mt-2" maxlength="15" name="sub_total" id="sub_total" >			
                            </div>
                            <div class="form-group col">
                                <label>Desconto Sub Total</label>
                                <input type="text"  class="form-control mt-2" maxlength="15" name="desconto" id="desconto"  onkeyup="formatarMoeda(this);" onblur="calculaSubTotal();">			
                            </div>
                            <div class="form-group col">
                                <label>Total da Venda</label>
                                <input type="text" readonly class="form-control mt-2" maxlength="15" name="total_venda" id="total_venda">          
                            </div>

                            
                        </div>   
                        <div class="form-group col mt-4">
                            <button id ="bt" type="button" class="btn btn-primary btn-sm"  onclick="submeteFormulario()" > Concluir Venda </button>
                            <span id="msg"></span>
                        </div>
                    </div>    
                </div>	
                
                <input type="hidden" value="<?php echo $_REQUEST['codigo'] ?>"  name="cliente" id="cliente">
                <div class="cor mt-3">
                    <div class="row ">
                        <div class="form-group col">
                            <label> Produto</label>
                            <select class="form-select mt-2"   name="produto" id="produto">
                                <option value = ""  >
                                    Selecione o Produto
                                </option>
                                <?php
                                    while($row = pg_fetch_array($result)){
                                ?>
                                
                                <option value = "<?php echo $row['codigo'];?>"  >
                                    <?php echo $row['descricao'];  ?>
                                </option>
                                <?php } ?>				
                            </select> 
                        </div>

                        <div class="form-group col" >
                            <label>Quantidade</label>
                            <input type="number"  class="form-control mt-2" maxlength="15" name="quantidade" id="quantidade">
                        </div>

                        <div class="form-group col mt-4">
                            <button id ="bt" type="button" class="btn btn-primary btn-sm mt-2"  onclick="addProduto()" > Adicionar Produto </button>
                        </div>
                    </div>
                </div>
                <div id="containerTabela" class="form-group mt-4 cor">
                    <table id="table_produto" class="table">
                        <tr>
                            <th>Produto</th>
                            <th>quantidade</th>
                            <th>Valor Unitario</th>
                            <th>Valor total</th>
                            <th></th>
                        </tr>
                    </table>
                </div>     
                <br> <br>                           
               
              		
            </fieldset>
        </form>
        
	</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/createRequest.js"></script>
    <script src="../js/cadastraProduto.js"></script>
    <script src="../js/venda.js"></script>
	</body>
</html>