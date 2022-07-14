<?php 
	session_start();
	include_once "../include/conecta.php";

		if(isset($_REQUEST['codigo'])){

			$codigo =$_REQUEST['codigo'];

			$result = pg_query($conecta, "SELECT * FROM produto WHERE codigo = '$codigo'");
			if(!$result){
				die("Falha ao listar Produto: " . pg_last_error());
			}
			else{
				$row = pg_fetch_array($result);
				echo $row['preco_prazo'] . "|" . $row['descricao'];
			}	
		}

		include "../include/desconecta.php";
?>