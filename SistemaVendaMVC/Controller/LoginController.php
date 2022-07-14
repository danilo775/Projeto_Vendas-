<?php

class LoginController{
	
	public function telaLogin()
	{	
		require_once 'View/telaLogin.php';
	}
	public function telaListaCliente()
	{	
		require_once 'View/listaClientes.php';
	}

	public function add()
	{
		
		$connection = Model::createConnection();
		
		$usuario = $_REQUEST['usuario'];
		$senha = $_REQUEST['senha'];

		
		$login = new Login();
		$login->setUsuario($usuario);
		$login->setSenha($senha);
		
		$loginModel = new LoginModel($connection);
		$result = $loginModel->insert($login);
		
		if($result["sucess"] === true)
		{
			echo "Dados inseridos com sucesso!";
		}
		else
		{
			echo "Erro ao executar: " . $result["code"];
		}
	}
	
	public function remove()
	{
		$connection = Model::createConnection();
		
		$codigo = $_REQUEST['codigo'];
		
		$loginModel = new LoginModel($connection);
		$result = $loginModel->delete($codigo);
		
		if($result === true)
		{
			echo "Dados removidos com sucesso!";
		}
		else
		{
			echo "Erro ao executar: " . $result;
		}		
	}

	public function atualiza(){
		$connection = Model::createConnection();

		$codigo = $_REQUEST['codigo'];
		$usuario = $_REQUEST['usuario'];
		$senha = $_REQUEST['senha'];


		
		$login = new Login();
		$login->setCodigo($codigo);
		$login->setUsuario($usuario);
		$login->setSenha($senha);
		
		$loginModel = new LoginModel($connection);
		$result = $loginModel->update($login);
		
		if($result === true)
		{
			echo "Dados atualizados com sucesso";
		}
		else
		{
			echo "Erro ao atualizar: " . $result;
		}
	}

		public function cadastroPessoa ()
	{
		require_once 'cadastroPessoa.php';
	}

	public function listarPessoas()
	{
		$connection = Model::createConnection();

		$pessoaModel = new PessoaModel($connection);
		$pessoas = $pessoaModel->selectAll();
		$_REQUEST['pessoas'] = $pessoas;

		require_once 'listagemPessoa.php';
	}

	public function listarPessoa()
	{
		$codigo = $_REQUEST['codigo'];
		$connection = Model::createConnection();

		$pessoaModel = new PessoaModel($connection);
		$pessoa = $pessoaModel->select($codigo);
		$_REQUEST['pessoa'] = $pessoa;

		require_once 'atualiza.php';
	}

	public function login($usuario, $senha)
	{
		require_once '../ValueObject/Login.php';
		require_once '../Model/LoginModel.php';
		require_once '../Model/Model.php';
		die('erro');
		header("Content-type: application/json");
		$login = json_decode(file_get_contents("php://input"));

		if(isset($login->user) && isset($login->senha)){
			$usuario=$login->usuario;
			$senha=$login->senha;
			$connection = DAO::createConnection();
			
			$loginModel = new LoginModel($connection);
			$result = $loginModel->selectByLogin($usuario, $senha);
			
			if(is_array($result))
			{
				if(count($result) == 1)
				{
					$usuario = $result[0];
					$_SESSION["conectado"] = true;
					$_SESSION["usuario"] = $usuario->getUsuario();
					$_SESSION["codigo"] = $usuario->getCodigo();
					this->ListaCliente();
				}
				else{
					return "Usuário ou Senha inválidos!";
				}
			}
			else{
				return "Erro ao executar: " . $result;
			}
		}				
	}

	public function unlogin()
	{
		$_SESSION["conectado"] = false;
		unset($_SESSION["usuario"]);
		
		$this->telaLogin();
	}
	
}
?>