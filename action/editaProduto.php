<?php 
	session_start();
	include_once "../include/conecta.php";
	header("Content-type: application/json");
	$produto = json_decode(file_get_contents("php://input"));

	if(isset($produto->codigo) && isset($produto->descricao) && isset($produto->preco_custo) && isset($produto->preco_vista) 
	&& isset($produto->preco_prazo) && isset($produto->quantidade)){
				
		$produto->preco_custo = str_replace(".", "", $produto->preco_custo);
		$produto->preco_custo = str_replace(",", ".", $produto->preco_custo);
	
		$produto->preco_vista = str_replace(".", "", $produto->preco_vista);
		$produto->preco_vista = str_replace(",", ".", $produto->preco_vista);
	
		$produto->preco_prazo = str_replace(".", "", $produto->preco_prazo);
		$produto->preco_prazo = str_replace(",", ".", $produto->preco_prazo);

		$prepare = pg_prepare($conecta,"edtProduto","UPDATE produto SET descricao =$2, preco_custo =$3, preco_vista = $4, preco_prazo = $5, quantidade = $6 WHERE codigo = $1");
		$result = pg_execute($conecta,"edtProduto", array($produto->codigo,$produto->descricao,$produto->preco_custo,$produto->preco_vista,$produto->preco_prazo,$produto->quantidade));

	}else{
				
		die("Erro ao executar: " . pg_last_error($conecta));
	}
die("ok");
include_once "../include/desconecta.php";
?>