<?php 
	session_start();
	include_once "../include/conecta.php";

	header("Content-type: application/json");
	$cliente = json_decode(file_get_contents("php://input"));

	
	$usuario = $_SESSION['codigo'];


	$res = pg_query($conecta,"INSERT INTO cliente(nome,endereco,numero,celular,cidade,bairro,cpf,mais_informacoes,usuario) VALUES ('$cliente->nome','$cliente->endereco','$cliente->numero','$cliente->celular','$cliente->cidade','$cliente->bairro','$cliente->cpf','$cliente->mais_informacoes','$usuario')");

	if($res == false){
		die("erro ao inserir");
	}
	echo"ok";
	include "../include/desconecta.php";
?>