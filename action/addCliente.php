<?php 
	session_start();
	include_once "../include/conecta.php";

		if(isset($_REQUEST['nome']) && isset($_REQUEST['endereco']) && isset($_REQUEST['numero'])  && isset($_REQUEST['celular']) 
		 && isset($_REQUEST['cidade'])  && isset($_REQUEST['bairro'])  && isset($_REQUEST['cpf']) && isset($_REQUEST['mais_informacoes']) 
		){
			$nome = $_REQUEST['nome'];
			$endereco = $_REQUEST['endereco'];
			$numero = $_REQUEST['numero'];
			$celular = $_REQUEST['celular'];
			$cidade = $_REQUEST['cidade'];
			$bairro = $_REQUEST['bairro'];
			$cpf = $_REQUEST['cpf'];
			$mais_informacoes = $_REQUEST['mais_informacoes'];
			
			$usuario = $_SESSION['codigo']; 

			$prepare = pg_prepare($conecta, "Cliente", "INSERT INTO cliente (nome,endereco,numero,celular,cidade,bairro,cpf,mais_informacoes,usuario) 
			  VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9)");
			$result = pg_execute($conecta, "Cliente", array($nome, $endereco, $numero, $celular, $cidade, $bairro, $cpf, $mais_informacoes,$usuario));

				if(!$result){
					die("Falha ao adicionar Cliente: " . pg_last_error());
				}

		}else{
			die("Não foram definidos os campos de validação!");
		}
		echo"ok";
		include "../include/desconecta.php";
		header("Location: ../pags/listaClientes.php");
	?>	