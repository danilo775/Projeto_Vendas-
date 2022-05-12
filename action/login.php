<?php 
	session_start();
	include_once "../include/conecta.php";

	if(isset($_REQUEST['user']) && isset($_REQUEST['senha'])){
		$usuario = $_REQUEST['user'];
		$senha = $_REQUEST['senha'];

		$prepare = pg_prepare($conecta,"login", "SELECT * FROM login WHERE usuario = $1 AND senha = md5($2)");
		$result = pg_execute($conecta, "login", array($usuario,$senha));
 
			if(pg_num_rows($result)>0){
				$linha = pg_fetch_array($result);
				$_SESSION['codigo'] = $linha['codigo'];
				$_SESSION['usuario'] = $linha['usuario'];
			}else{
				die("Error: Usuario ou Senha Incorreto".pg_last_error());
			}		

	}else{
		die("error: campos em brancos".pg_last_error());
	} 
	echo"ok";
	include_once "../include/desconecta.php";
	//header("Location: ../pags/listaClientes.php");
?>