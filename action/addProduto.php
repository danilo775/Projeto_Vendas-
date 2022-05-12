<?php 
	session_start();
	include_once "../include/conecta.php";

		if(isset($_REQUEST['descricao']) && isset($_REQUEST['preco_custo']) && isset($_REQUEST['preco_vista']) && isset($_REQUEST['preco_prazo'])  && isset($_REQUEST['quantidade'])){
			$descricao = $_REQUEST['descricao'];
			
			$preco_custo = $_REQUEST["preco_custo"];
			$preco_custo = str_replace(".", "", $preco_custo);
			$preco_custo = str_replace(",", ".", $preco_custo);
		
			$preco_vista = $_REQUEST["preco_vista"];
			$preco_vista = str_replace(".", "", $preco_vista);
			$preco_vista = str_replace(",", ".", $preco_vista);
		
			$preco_prazo = $_REQUEST["preco_prazo"];
			$preco_prazo = str_replace(".", "", $preco_prazo);
			$preco_prazo = str_replace(",", ".", $preco_prazo);

			$quantidade = $_REQUEST['quantidade'];
			
			$usuario = $_SESSION['codigo']; 

			$prepare = pg_prepare($conecta, "Produto", "INSERT INTO produto (descricao,preco_custo,preco_vista,preco_prazo,quantidade) 
				VALUES ($1,$2,$3,$4,$5)");
			$result = pg_execute($conecta, "Produto", array($descricao, $preco_custo, $preco_vista, $preco_prazo, $quantidade));

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