<?php 
	session_start();
	include_once "../include/conecta.php";
	header("Content-type: application/json");
	$senha = json_decode(file_get_contents("php://input"));

	if(isset($senha->codigo) && isset($senha->senha_nova) && isset($senha->senha_antiga) ){
		$codigo = $senha->codigo;
        $prepare = pg_prepare($conecta,"atlSenha", "SELECT * FROM login WHERE $codigo =$1");
		$result1 = pg_execute($conecta,"atlSenha", array($codigo));
		 
		if(pg_num_rows($result1)>0){
			while($linha = pg_fetch_array($result1))
            {
                $pwd = $linha["senha"];
            }    
		}
    
        if(md5($senha->senha_antiga) == $pwd )
        {
            $prepare = pg_prepare($conecta,"edtLogin","UPDATE login SET senha = md5('$senha->senha_nova') WHERE codigo=$codigo");
            $result = pg_execute($conecta,"edtLogin", array());
        }else{
            die("Senha antiga estar errada " . pg_last_error($conecta));
        }

	}else{
		
		die("Erro ao executar: " . pg_last_error($conecta));
	}
	
	die("ok");
	include_once "../include/desconecta.php";
?>