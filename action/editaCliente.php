<?php 
	session_start();
	include_once "../include/conecta.php";
	header("Content-type: application/json");
	$cliente = json_decode(file_get_contents("php://input"));

	if(isset($cliente->codigo) && isset($cliente->nome) && isset($cliente->endereco) && isset($cliente->numero) && isset($cliente->celular)
	   && isset($cliente->bairro) && isset($cliente->cpf) && isset($cliente->cidade) && isset($cliente->mais_informacoes)){
		

		$prepare = pg_prepare($conecta,"edtCliente","UPDATE cliente SET nome =$2, endereco =$3, numero = $4, celular = $5, bairro = $6, cpf = $7, cidade =$8, mais_informacoes =$9  WHERE codigo = $1");
		$result = pg_execute($conecta,"edtCliente", array($cliente->codigo,$cliente->nome,$cliente->endereco,$cliente->numero,$cliente->celular,$cliente->bairro,$cliente->cpf,$cliente->cidade,$cliente->mais_informacoes));


	}else{
		
		die("Erro ao executar: " . pg_last_error($conecta));
	}
	
	die("ok");
	include_once "../include/desconecta.php";
?>