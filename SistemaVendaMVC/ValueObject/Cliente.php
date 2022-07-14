<?php

class Cliente {
	
	// Atributos
	private $codigo;
	private $nome;
	private $cpf;
	private $endereco;
	private $celular;
	private $cidade;
	private $bairro;
	private $numero;
	private $mais_informacoes;
	private $usuario;
	
	public function __construct(){
		$this->codigo = NULL;
		$this->nome = NULL;
		$this->cpf = NULL;
		$this->endereco = NULL;
		$this->celular = NULL;
		$this->cidade = NULL;
		$this->bairro = NULL;
		$this->numero = NULL;
		$this->mais_informacoes = NULL;
		$this->usuario = NULL;
	}
	
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}
	
	public function setNome($nome)
	{
		$this->nome = $nome;				
	}
	
	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}
	
	public function setEndereco($endereco)
	{
		$this->endereco = $endereco;
	}

	public function setCelular($celular)
	{
		$this->celular = $celular;
	}

	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}

	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

	public function setMais_informacoes($mais_informacoes)
	{
		$this->mais_informacoes = $mais_informacoes;
	}
	
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}	
	
	public function getCodigo()
	{
		return $this->codigo;
	}
	
	public function getNome()
	{
		return $this->nome;
	}

	public function getCpf()
	{
		return $this->cpf;
	}
	
	public function getEndereco()
	{
		return $this->endereco;
	}

	public function getCelular()
	{
		return $this->celular;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function getMais_informacoes()
	{
		return $this->mais_informacoes;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function toString()
	{
		$str  = "Codigo: " . $this->getCodigo() . "<br>";
		$str .= "Nome: " . $this->getNome() . "<br>";
		$str .= "Cpf: " . $this->getCpf() . "<br>";
		$str .= "Endereço: " . $this->getEndereco() . "<br>";
		$str .= "Celular: " . $this->getCelular() . "<br>";
		$str .= "Cidade: " . $this->getCidade() . "<br>";
		$str .= "Bairro: " . $this->getBairro() . "<br>";
		$str .= "Numero: " . $this->getNumero() . "<br>";
		$str .= "Mais informações: " . $this->getMais_informacoes() . "<br>";
		$str .= "Usuario: " . $this->getUsuario() . "<br>";
		
		return $str;
	}
}
?>