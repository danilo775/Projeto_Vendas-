<?php

class Login {
	
	// Atributos
	private $codigo;
	private $usuario;
	private $senha;
	private $tipo;
	
	public function __construct(){
		$this->codigo = NULL;
		$this->usuario = NULL;
		$this->senha = NULL;
		$this->tipo = NULL;
	}
	
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}
	
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;				
	}
	
	public function setSenha($senha)
	{
		$this->senha = $senha;
	}
	
	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}
	
	public function getCodigo()
	{
		return $this->codigo;
	}
	
	public function getUsuario()
	{
		return $this->usuario;
	}

	public function getSenha()
	{
		return $this->senha;
	}
	
	public function getTipo()
	{
		return $this->tipo;
	}

	public function getTipoTexto()
	{
		switch($this->tipo)
		{
			case 1: return "Comum";
			case 2: return "Administrador";
		}
	}
	
	public function toString()
	{
		$str  = "Codigo: " . $this->getCodigo() . "<br>";
		$str .= "Usuario: " . $this->getUsuario() . "<br>";
		$str .= "Tipo: " . $this->getTipoTexto() . "<br>";
		
		return $str;
	}
}

?>