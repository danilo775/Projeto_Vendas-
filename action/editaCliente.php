<?php 
	session_start();
	include_once "../include/conecta.php";

	if(isset($_POST['codigo']) && isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['numero']) && isset($_POST['celular'])
	   && isset($_POST['bairro']) && isset($_POST['cpf']) && isset($_POST['cidade']) && isset($_POST['mais_informacoes'])){
		$codigo = $_POST['codigo'];
		$nome = $_POST['nome'];
		$endereco= $_POST['endereco'];
		$numero = $_POST['numero'];
		$celular = $_POST['celular'];
		$bairro = $_POST['bairro'];
		$cpf = $_POST['cpf'];
		$cidade = $_POST['cidade'];
		$mais_informacoes = $_POST['mais_informacoes'];

		

		$prepare = pg_prepare($conecta,"edtCliente","UPDATE cliente SET nome =$2, endereco =$3, numero = $4, celular = $5, bairro = $6, cpf = $7, cidade =$8, mais_informacoes =$9  WHERE codigo = $1");
		$result = pg_execute($conecta,"edtCliente", array($codigo,$nome,$endereco,$numero,$celular,$bairro,$cpf,$cidade,$mais_informacoes));


	}else{
		
		die("Erro ao executar: " . pg_last_error($conecta));
	}
	

include_once "../include/desconecta.php";
	header("Location: ../pags/listaClientes.php");



 ?>