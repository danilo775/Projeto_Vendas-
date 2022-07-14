 
<?php

abstract class Model {
	
	private $connection;
			
	public function getConnection()
	{
		return $this->connection;
	}
	
	public function setConnection($connection)
	{
		$this->connection = $connection;
	}
	
	public function isActive()
	{
		return(!is_null($this->connection));
	}
	
	public static function createConnection()
	{
		return new PDO("pgsql:host=localhost;port=5432;dbname=sistemaVendas;user=postgres;password=1");
	}	
		
	abstract public function insert($obj);
	abstract public function delete($value);
	abstract public function update($obj);
	abstract public function selectAll();
}

?>