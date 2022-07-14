<?php

$host = "localhost";
$dbname = "sistemaVendas";
$port = "5432";
$user = "postgres";
$pwd = "1";

	$conecta = pg_connect("host=$host dbname=$dbname port=$port user=$user password=$pwd");
		if(!$conecta){
			die("nao conectou ao banco".pg_last_error());
		}
?>