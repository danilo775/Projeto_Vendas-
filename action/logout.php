<?php 
	session_start();

	$_SESSION['conectado'] =  false;
	unset($_SESSION['usuario']);
	unset($_SESSION['senha']);


	header("Location: ../pags/index.php");
?>
