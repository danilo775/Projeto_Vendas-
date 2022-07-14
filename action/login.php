<?php 
	session_start();
	include_once "../include/conecta.php";

	header("Content-type: application/json");
	$login = json_decode(file_get_contents("php://input"));

	if(isset($login->user) && isset($login->senha)){
		
		$prepare = pg_prepare($conecta,"login", "SELECT * FROM login WHERE usuario = $1 AND senha = md5($2)");
		$result = pg_execute($conecta, "login", array($login->user,$login->senha));
 
			if(pg_num_rows($result)>0){
				$linha = pg_fetch_array($result);
				$_SESSION['codigo'] = $linha['codigo'];
				$_SESSION['usuario'] = $linha['usuario'];
				$_SESSION['conectado'] = true;
			}else{
				die("Error: Usuario ou Senha Incorreto".pg_last_error($conecta));
			}		

	}else{
		die("error: campos em brancos".pg_last_error($conecta));
	} 
	echo"ok";
	include_once "../include/desconecta.php";
	//header("Location: ../pags/listaClientes.php");
?>