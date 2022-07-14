<?php
require_once 'Model/Model.php';
require_once 'Model/ClienteModel.php';
require_once 'ValueObject/Cliente.php';


class ClienteController{

	public function telaCadastroCliente()
	{
		include_once "View/cadastrarCliente.php";
	}
	public function telaAtualizaCliente()
	{
		include_once "View/atualizaCliente.php";
	}
	public function telaCadastrarCliente()
	{
		include_once "View/cadastrarCliente.php";
	}
	public function telaListaCliente()
	{	
		require_once 'View/listaClientes.php';
	}

	public function add()
	{	
		header("Content-type: application/json");
		$cliente = json_decode(file_get_contents("php://input"));

		$connection = Model::createConnection();		
		
		$cliente = new Cliente();
		$cliente->setNome($cliente->nome);
		$cliente->setEndereco($cliente->cpf);
		$cliente->setNumero($cliente->numero);
		$cliente->setCelular($cliente->celular);
		$cliente->setCidade($cliente->cidade);
		$cliente->setbairro($cliente->bairro);
		$cliente->setCpf($cliente->cpf);
		$cliente->setMais_informacoes($cliente->mais_informacoes);
		$cliente->setUsuario($_SESSION['usuario']);
		
		$clienteModel = new ClienteModel($connection);
		$result = $clienteModel->insert($cliente);
		
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
		
		$clienteModel = new ClienteModel($connection);
		$result = $clienteModel->delete($codigo);
		
		if($result === true)
		{
			echo "Dados removidos com sucesso!";
		}
		else
		{
			echo "Erro ao executar: " . $result;
		}		
	}


	public function listarClientes()
	{
		$connection = Model::createConnection();

		$clienteModel = new ClienteModel($connection);
		$clientes = $clienteModel->selectAll();
		$_REQUEST['clientes'] = $clientes;

		require_once 'View/listaClientes.php';
	}

	public function listarCliente()
	{
		$codigo = $_REQUEST['codigo'];
		$connection = Model::createConnection();

		$clienteModel = new ClienteModel($connection);
		$cliente = $clienteModel->select($codigo);
		$_REQUEST['cliente'] = $cliente;

		require_once 'View/listaClientes.php';
	}

	public function atualiza(){

		header("Content-type: application/json");
		$cliente = json_decode(file_get_contents("php://input"));

		$connection = Model::createConnection();		
		
		$cliente = new Cliente();
		$cliente->setCodigo($cliente->codigo);
		$cliente->setNome($cliente->nome);
		$cliente->setEndereco($cliente->cpf);
		$cliente->setNumero($cliente->numero);
		$cliente->setCelular($cliente->celular);
		$cliente->setCidade($cliente->cidade);
		$cliente->setbairro($cliente->bairro);
		$cliente->setCpf($cliente->cpf);
		$cliente->setMais_informacoes($cliente->mais_informacoes);
		$cliente->setUsuario($_SESSION['usuario']);
		
		$clienteModel = new ClienteModel($connection);
		$result = $clienteModel->update($cliente);
		
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