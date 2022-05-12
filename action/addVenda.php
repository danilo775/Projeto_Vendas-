<?php 
	session_start();
	include_once "../include/conecta.php";

		if(isset($_REQUEST['produto']) && isset($_REQUEST['valor']) && isset($_REQUEST['desconto'])  && isset($_REQUEST['quantidade']) 
		 && isset($_REQUEST['data_pagamento'])  && isset($_REQUEST['tipo'])  && isset($_REQUEST['cliente']) 
		){
			$produto = $_REQUEST['produto'];

			$valor = $_REQUEST['valor'];
			$valor = str_replace(".", "", $valor);
			$valor = str_replace(",", ".", $valor);

			$desconto = $_REQUEST['desconto'];
			$valor = str_replace(".", "", $valor);
			$valor = str_replace(",", ".", $valor);

			$quantidade = $_REQUEST['quantidade'];
			$data_pagamento = $_REQUEST['data_pagamento'];
			$tipo = $_REQUEST['tipo'];
			$cliente = $_REQUEST['cliente'];
		
			
			$usuario = $_SESSION['codigo']; 

            // Iniciando a transacao
			pg_query("BEGIN");

			// Operação 1
			$result = pg_query("INSERT INTO venda (produto,valor,data_pagamento,tipo,usuario,cliente,data_venda) VALUES ('$produto', '$valor', '$data_pagamento', '$tipo', '$usuario', '$cliente',CURRENT_DATE) RETURNING codigo");
	
			// Se a operação 1 funcionar, então:
			if($result != FALSE){
				// Obtendo o valor do codigo passado por RETURNING
				$linha = pg_fetch_array($result);
				$venda = $linha["codigo"];

				// Operação 2
				$result = pg_query("INSERT INTO contem (produto,venda,quantidade,desconto) VALUES ('$produto', '$venda', '$quantidade', '$desconto')");				

				// Se a operação 2 funcionar, então:
				if($result != FALSE){
					echo "Venda realizada";
					pg_query("COMMIT");
				}
				// Caso contrário (operação 2)
				else{
					pg_query("ROLLBACK");					
					die("Erro ao realizar a venda");
				}
			}
			// Caso contrário (operação 1)
			else{
				pg_query("ROLLBACK");					
				die("Erro ao realizar a venda");
			}
		}
		else{
			die("Não foram definidos os campos de validação!");
		}

		include "../include/desconecta.php";
		header("Location: ../pags/listaClientes.php");
	?>	