<?php 
	session_start();
	include_once "../include/conecta.php";

	header("Content-type: application/json");
	$pagamento = json_decode(file_get_contents("php://input"));
	
	
		if(isset($pagamento->valor_pago) && isset($pagamento->tipo_operacao) && isset($pagamento->venda) && isset($pagamento->data_pagamento)){
		
			$pagamento->valor_pago = str_replace(".", "", $pagamento->valor_pago);
			$pagamento->valor_pago = str_replace(",", ".", $pagamento->valor_pago);
				
			$usuario = $_SESSION['codigo']; 

			$prepare = pg_prepare($conecta, "pagamento", "INSERT INTO pagamento (valor_pago,tipo_operacao,venda,usuario,data_pagamento) 
				VALUES ($1,$2,$3,$4,$5)");
			$result = pg_execute($conecta, "pagamento", array($pagamento->valor_pago, $pagamento->tipo_operacao, $pagamento->venda, $usuario, $pagamento->data_pagamento));

				if(!$result){
					die("Falha ao realizar pagamento: " );
				}

		}else{
			die("Não foram definidos os campos de validação!");
		}
		echo "ok";
		include "../include/desconecta.php";
//header("Location: ../pags/listaClientes.php");
?>