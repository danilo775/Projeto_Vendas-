<?php
 
require_once 'Model.php';
require_once 'PessoaModel.php';
require_once 'Pessoa.php';


class PessoaController{
	
	public function add()
	{
		$connection = Model::createConnection();
		
		$nome = $_REQUEST['nome'];
		$cpf = $_REQUEST['cpf'];
		
		$pessoa = new pessoa();
		$pessoa->setNome($nome);
		$pessoa->setCpf($cpf);
		
		$pessoaModel = new pessoaModel($connection);
		$result = $pessoaModel->insert($pessoa);
		
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
		
		$pessoaModel = new pessoaModel($connection);
		$result = $pessoaModel->delete($codigo);
		
		if($result === true)
		{
			echo "Dados removidos com sucesso!";
		}
		else
		{
			echo "Erro ao executar: " . $result;
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

	public function atualiza(){
		$connection = Model::createConnection();

		$codigo = $_REQUEST['codigo'];
		$nome = $_REQUEST['nome'];
		$cpf = $_REQUEST['cpf'];


		
		$pessoa = new Pessoa();
		$pessoa->setCodigo($codigo);
		$pessoa->setNome($nome);
		$pessoa->setCpf($cpf);
		
		$pessoaModel = new pessoaModel($connection);
		$result = $pessoaModel->update($pessoa);
		
		if($result === true)
		{
			echo "Dados atualizados com sucesso";
		}
		else
		{
			echo "Erro ao atualizar: " . $result;
		}
	}

	
}

?>