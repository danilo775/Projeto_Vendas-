<?php
 
class Pessoa {
	
	// Atributos
	private $codigo;
	private $nome;
	private $cpf;
	
	public function __construct(){
		$this->codigo = NULL;
		$this->nome = NULL;
		$this->cpf = NULL;
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
	
	public function toString()
	{
		$str  = "Codigo: " . $this->getCodigo() . "<br>";
		$str .= "Nome: " . $this->getNome() . "<br>";
		$str .= "CPF: " . $this->getCpf() . "<br>";
		
		return $str;
	}
}

?>