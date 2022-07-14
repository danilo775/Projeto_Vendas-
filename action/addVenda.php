<?php 
	session_start();
	include_once "../include/conecta.php";
	header("Content-Type: application/json");
    $dados = json_decode(file_get_contents("php://input"));
    //var_dump($dados->contem);
    //die();
	if(isset($dados->valor) && isset($dados->data_vencimento) && isset($dados->tipo) &&
		isset($dados->cliente) && isset($dados->desconto)){

		$usuario = $_SESSION['codigo'];

		$dados->valor = str_replace(".", "", $dados->valor);
		$dados->valor = str_replace(",", ".", $dados->valor);

		$dados->desconto = str_replace(".", "", $dados->desconto);
		$dados->desconto = str_replace(",", ".", $dados->desconto);

		 // Iniciando a transacao
		pg_query($conecta,"BEGIN");

		$result = pg_query($conecta,"INSERT INTO venda (valor,data_vencimento,tipo,usuario,cliente,desconto,data_venda) VALUES ('$dados->valor', '$dados->data_vencimento', '$dados->tipo', '$usuario', '$dados->cliente', '$dados->desconto',CURRENT_DATE) RETURNING codigo");
		
		if($result != FALSE){
			$linha = pg_fetch_array($result);
			$venda = $linha["codigo"];
			
			foreach ($dados->contem as $value) {
				$produto = $value->codigo;
				$quantidade = $value->quantidade;
				$result = pg_query($conecta,"INSERT INTO contem (produto,venda,quantidade) VALUES ('$produto', '$venda', '$quantidade')");	
				if($result != FALSE)
				{
					pg_query($conecta,"COMMIT");
				}
				else{
					pg_query($conecta,"ROLLBACK");	
					die("Erro ao realizar a venda");
				}
			}
			
		}
		else{
			pg_query($conecta,"ROLLBACK");
			die("Erro ao realizar a venda");
		}
	}
	else{
		die("Não foram definidos os campos de validação!");
	}
	echo "ok";
	include "../include/desconecta.php";
?>