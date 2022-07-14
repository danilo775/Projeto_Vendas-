<?php
 
/*
CREATE TABLE Pessoa (
	codigo serial,
	nome varchar NOT null,
	cpf varchar NOT null,
	PRIMARY KEY(codigo)
);
*/

require_once 'Model.php';
require_once 'Pessoa.php';

class PessoaModel extends Model{
	public function __construct($connection)
	{
		$this->setConnection($connection);
	}
	
	public function insert($obj)
	{
		$sql = "INSERT INTO pessoa (nome, cpf)
				VALUES (?, ?)";
		
		try{
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->bindValue(1, $obj->getNome());
			$stmt->bindValue(2, $obj->getCpf());
			$stmt->execute();					
		} catch(Exception $e){
			
			$result["sucess"] = false;
			$result["code"] = $e->getCode();
			
			return $result;
		}
		
		$result["sucess"] = true;
		$result["code"] = $this->getConnection()->lastInsertId();
		
		return $result;
	}
	
	public function delete($value)
	{
		$sql = "DELETE FROM pessoa WHERE codigo = ?";
		
		try{
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->bindValue(1, $value);
			$stmt->execute();					
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return true;		
	}
	
	public function update($obj)
	{
		$sql = "UPDATE pessoa SET nome = ?, cpf = ?
				WHERE codigo = ?";
		
		try{
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->bindValue(1, $obj->getNome());
			$stmt->bindValue(2, $obj->getCpf());
			$stmt->bindValue(3, $obj->getCodigo());
			$stmt->execute();					
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return true;		
	}
	
	public function selectAll()
	{
		$lista = array();
		$sql = "SELECT * FROM pessoa";
		
		try{
			$result = $this->getConnection()->query($sql);
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$pessoa = new Pessoa();
				$pessoa->setCodigo($row["codigo"]);
				$pessoa->setNome($row["nome"]);
				$pessoa->setCpf($row["cpf"]);
				
				$lista[] = $pessoa;				
			}
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return $lista;
	}
	
	public function select($value)
	{
		
		$sql = "SELECT * FROM pessoa WHERE codigo = $value";
		
		try{
			$result = $this->getConnection()->query($sql);
			
			$row = $result->fetch(PDO::FETCH_ASSOC);
			
			$pessoa = new Pessoa();
			$pessoa->setCodigo($row["codigo"]);
			$pessoa->setNome($row["nome"]);
			$pessoa->setCpf($row["cpf"]);
					
		
			
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return $pessoa;
	}
}

?>