<?php
 
require_once 'Model.php';
require_once 'ValueObject/Cliente.php';

class ClienteModel extends Model{
	public function __construct($connection)
	{
		$this->setConnection($connection);
	}
	
	public function insert($obj)
	{
		$sql = "INSERT INTO cliente (nome,endereco,numero,celular,cidade,bairro,cpf,mais_informacoes,usuario)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
		try{
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->bindValue(1, $obj->getNome());
			$stmt->bindValue(2, $obj->getEndereco());
			$stmt->bindValue(3, $obj->getNumero());
			$stmt->bindValue(4, $obj->getCelular());
			$stmt->bindValue(5, $obj->getCidade());
			$stmt->bindValue(6, $obj->getBairro());
			$stmt->bindValue(7, $obj->getCpf());
			$stmt->bindValue(8, $obj->getMais_informacoes());
			$stmt->bindValue(9, $obj->getUsuario());
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
		$sql = "DELETE FROM cliente WHERE codigo = ?";
		
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
		$sql = "UPDATE cliente SET  nome = ?, endereco = ?, numero = ?, celular = ?, bairro = ?, cpf = ?, cidade = ?, mais_informacoes = ?
				WHERE codigo = ?";
		
		try{
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->bindValue(1, $obj->getCodigo());
			$stmt->bindValue(2, $obj->getNome());
			$stmt->bindValue(3, $obj->getEndereco());
			$stmt->bindValue(4, $obj->getNumero());
			$stmt->bindValue(5, $obj->getCelular());
			$stmt->bindValue(6, $obj->getCidade());
			$stmt->bindValue(7, $obj->getBairro());
			$stmt->bindValue(8, $obj->getCpf());
			$stmt->bindValue(9, $obj->getMais_informacoes());
			$stmt->execute();					
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return true;		
	}
	
	public function selectAll()
	{
		$lista = array();
		$sql = "SELECT * FROM cliente";
		
		try{
			$result = $this->getConnection()->query($sql);
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$cliente = new Cliente();		
				$cliente->setNome($row["nome"]);
				$cliente->setEndereco($row["endereco"]);
				$cliente->setNumero($row["numero"]);
				$cliente->setCelular($row["celular"]);
				$cliente->setbairro($row["bairro"]);
				$cliente->setCidade($row["cidade"]);
				$cliente->setMais_informacoes($row["mais_informacoes"]);
				
				$lista[] = $cliente;				
			}
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return $lista;
	}
	
	public function select($value)
	{
		
		$sql = "SELECT * FROM cliente WHERE codigo = $value";
		
		try{
			$result = $this->getConnection()->query($sql);
			
			$row = $result->fetch(PDO::FETCH_ASSOC);
			
			$cliente = new Cliente();		
			$cliente->setNome($row["nome"]);
			$cliente->setEndereco($row["endereco"]);
			$cliente->setNumero($row["numero"]);
			$cliente->setCelular($row["celular"]);
			$cliente->setbairro($row["bairro"]);
			$cliente->setCidade($row["cidade"]);
			$cliente->setMais_informacoes($row["mais_informacoes"]);
	
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return $cliente;
	}
}

?>