<?php
 
require_once 'Model.php';
require_once 'ValueObject/Login.php';

class LoginModel extends Model{
	public function __construct($connection)
	{
		$this->setConnection($connection);
	}
	
	public function insert($obj)
	{
		$sql = "INSERT INTO login (usuario, senha, tipo)
				VALUES (?, ?, ?)";
		
		try{
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->bindValue(1, $obj->getUsuario());
			$stmt->bindValue(2, $obj->getSenha());
			$stmt->bindValue(3, $obj->getTipo());
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
		$sql = "DELETE FROM login WHERE codigo = ?";
		
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
		$sql = "UPDATE login SET usuario = ?, senha = ?, tipo = ?
				WHERE codigo = ?";
		
		try{
			$stmt = $this->getConnection()->prepare($sql);
			$stmt->bindValue(1, $obj->getUsuario());
			$stmt->bindValue(2, $obj->getSenha());
			$stmt->bindValue(3, $obj->getTipo());
			$stmt->bindValue(4, $obj->getCodigo());
			$stmt->execute();			
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return true;	
	}
	
	public function selectAll()
	{
		$lista = array();
		$sql = "SELECT * FROM login";
		
		try{
			$result = $this->getConnection()->query($sql);
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$login = new Login();
				$login->setCodigo($row["codigo"]);
				$login->setUsuario($row["usuario"]);
				$login->setSenha($row["senha"]);
				$login->SetTipo($row["tipo"]);
				
				$lista[] = $login;				
			}
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return $lista;
	}
	
	public function select($value)
	{
		
		$sql = "SELECT * FROM login WHERE codigo = $value";
		
		try{
			$result = $this->getConnection()->query($sql);
			
			$row = $result->fetch(PDO::FETCH_ASSOC);
			
			$login = new Login();
			$login->setCodigo($row["codigo"]);
			$login->setUsuario($row["usuario"]);
			$login->setSenha($row["senha"]);
			$login->SetTipo($row["tipo"]);
		
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return $login;
	}
	
	public function selectByLogin($usuario, $senha)
	{
		$lista = array();
		$sql = "SELECT * FROM login WHERE usuario = '$usuario' AND senha = md5('$senha')";
		
		try{
			$result = $this->getConnection()->query($sql);
			
			$row = $result->fetchAll();
			
			if(count($row) == 1)
			{
				$row = $row[0];
				$login = new Login();
				$login->setCodigo($row["codigo"]);
				$login->setUsuario($row["usuario"]);
				$login->setTipo($row["tipo"]);
						
				$lista[] = $login;				
			}			
		} catch(Exception $e){
			return $e->getCode();
		}
		
		return $lista;
	}	
}
?>