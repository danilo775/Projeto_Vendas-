<?php

class Produto {
	
	// Atributos
	private $codigo;
	private $descricao;
	private $preco_custo;
	private $preco_vista;
	private $preco_prazo;
	private $quantidade;
	
	public function __construct(){
		$this->codigo = NULL;
		$this->descricao = NULL;
		$this->preco_custo = NULL;
		$this->preco_vista = NULL;
		$this->preco_prazo = NULL;
		$this->quantidade = NULL;
	}
	
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}
	
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;				
	}
	
	public function setPreco_custo($preco_custo)
	{
		$this->preco_custo = $preco_custo;
	}
	
	public function setPreco_vista($preco_vista)
	{
		$this->preco_vista = $preco_vista;
	}
	
	public function setPreco_prazo($preco_prazo)
	{
		$this->preco_prazo = $preco_prazo;
	}

	public function setQuantidade($quantidade)
	{
		$this->quantidade = $quantidade;
	}

	public function getCodigo()
	{
		return $this->codigo;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function getPreco_custo()
	{
		return $this->preco_custo;
	}

	public function getPreco_vista()
	{
		return $this->preco_vista;
	}

	public function getPreco_prazo()
	{
		return $this->preco_prazo;
	}

	public function getQuantidade()
	{
		return $this->quantidade;
	}
	
	
	public function getSenha()
	{
		return $this->senha;
	}
	
	public function getTipo()
	{
		return $this->tipo;
	}

	
	public function toString()
	{
		$str  = "Codigo: " . $this->getCodigo() . "<br>";
		$str .= "Descricao: " . $this->getDescricao() . "<br>";
		$str .= "Preco de custo: " . $this->getPreco_custo() . "<br>";
		$str .= "Preco a vista: " . $this->getPreco_vista() . "<br>";
		$str .= "Preco a prazo: " . $this->getPreco_prazo() . "<br>";
		$str .= "Quantidade: " . $this->getQuantidade() . "<br>";
		
		return $str;
	}
}

?>