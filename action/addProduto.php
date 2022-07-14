<?php 
	session_start();
	include_once "../include/conecta.php";

	header("Content-type: application/json");
	$produto = json_decode(file_get_contents("php://input"));

		if(isset($produto->descricao) && isset($produto->preco_custo) && isset($produto->preco_vista) && 
		isset($produto->preco_prazo)  && isset($produto->quantidade)){

			

			$produto->preco_custo = str_replace(".", "", $produto->preco_custo);
			$produto->preco_custo = str_replace(",", ".", $produto->preco_custo);
		
			$produto->preco_vista = str_replace(".", "", $produto->preco_vista);
			$produto->preco_vista = str_replace(",", ".", $produto->preco_vista);
		
			$produto->preco_prazo = str_replace(".", "", $produto->preco_prazo);
			$produto->preco_prazo = str_replace(",", ".", $produto->preco_prazo);

			
			$usuario = $_SESSION['codigo']; 

			$prepare = pg_prepare($conecta, "Produto", "INSERT INTO produto (descricao,preco_custo,preco_vista,preco_prazo,quantidade) 
				VALUES ($1,$2,$3,$4,$5)");
			$result = pg_execute($conecta, "Produto", array($produto->descricao, $produto->preco_custo, $produto->preco_vista, $produto->preco_prazo, $produto->quantidade));

				if(!$result){
					die("Falha ao adicionar Produto: " . pg_last_error());
				}

		}else{
			die("Não foram definidos os campos de validação!");
		}
		echo "ok";
		include "../include/desconecta.php";
//header("Location: ../pags/listaClientes.php");
?>