<?php 
	session_start();
	include_once "../include/conecta.php";

	if(isset($_REQUEST['codigo']) && isset($_REQUEST['descricao']) && isset($_REQUEST['preco_custo']) && isset($_REQUEST['preco_vista']) 
	&& isset($_REQUEST['preco_prazo']) && isset($_REQUEST['quantidade'])){
		
		$codigo = $_REQUEST['codigo'];
		$descricao = $_REQUEST['descricao'];
		$preco_custo= $_REQUEST['preco_custo'];
		$preco_vista = $_REQUEST['preco_vista'];
		$preco_prazo = $_REQUEST['preco_prazo'];
		$quantidade = $_REQUEST['quantidade'];
		

		$prepare = pg_prepare($conecta,"edtProduto","UPDATE produto SET descricao =$2, preco_custo =$3, preco_vista = $4, preco_prazo = $5, quantidade = $6 WHERE codigo = $1");
		$result = pg_execute($conecta,"edtProduto", array($codigo,$descricao,$preco_custo,$preco_vista,$preco_prazo,$quantidade));


	}else{
		
		die("Erro ao executar: " . pg_last_error($conecta));
	}
	
	

include_once "../include/desconecta.php";
	header("Location: ../pags/listaClientes.php");

 ?>