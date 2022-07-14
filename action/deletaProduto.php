<?php
	// Iniciando a sessão
	session_start();
	
	// Incluindo a conexao com o BD
	include_once "../include/conecta.php";
	
	if(isset($_GET["codigo"])){
		$codigo = $_GET["codigo"];
	}	

	$prepare = pg_prepare($conecta, "Produto",
						   "DELETE FROM produto WHERE codigo = $1");
	$result = pg_execute($conecta, "Produto", array($codigo));		
		
	if(!$result){
		die("Falha ao remover Produto: " . pg_last_error());
	}
		
	// Desconectando do BD
	include_once "../include/desconecta.php";
	
	// Redireciona para a listagem de livros
	header("Location: ../pags/listaProdutos.php");
?>