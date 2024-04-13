<?php


/**
 * 
 */
class DB
{
	protected static $instance;
	protected static $con;
	protected static $table;
	protected $values = array();
	protected $query;
	protected $query_type = "select";
	
	public static function table($table)
	{
		self::$table = $table;
		if (!self::$instance) {
			
			self::$instance = new self();
		}

		if (!self::$con) {
			
			try {
			
			$string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
			self::$con = new PDO($string, DBUSER, DBPASS);

			} catch (PDOException $e) {
				
				echo $e->getMessage();
				die();
			}
		}
		

		return self::$instance;
	}

	protected function run($values = array())
	{
		$stm = self::$con->prepare($this->query);
		$check = $stm->execute($values);
		if ($check) {

			switch ($this->query_type) {
				case 'select':
					$data = $stm->fetchAll(PDO::FETCH_OBJ);
					if (is_array($data) && count($data) > 0) {
						return $data;
					}
					break;

				case 'update':
					return true;
					break;

				case 'insert':
					return true;
					break;
				
				case 'delete':
					return true;
					break;
				
				default:
					// code...
					break;
			}
			
		}
		

		return false;
	}

	public function all()
	{
		
		return $this->run();
	}

	public function where($where, $values = array())
	{
		switch ($this->query_type) {
			case 'select':
				$this->query .= " WHERE " . $where;
				return $this->run($values);
				break;

			case 'update':
				$values = array_merge($this->values, $values);
				// print_r($values);			
				$this->query .= " WHERE " . $where;
				print_r($this->query);
				return $this->run($values);
				break;
			
			default:
				// code...
				break;
		}

		
	}

	public function select()
	{
		$this->query_type = "select";
		$this->query = "SELECT * FROM " . self::$table . " ";
		return self::$instance;
	}

	public function update(array $values)
	{
		$this->query_type = "update";
		$this->query = "UPDATE " . self::$table . " SET ";

		foreach ($values as $key => $value) {
			
			$this->query .= $key . "= :" . $key . ",";
		}


		$this->query = trim($this->query, ",");
		$this->values = $values;

		return self::$instance;
	}

	public function query($query, $value = array())
	{
		// code...
	}





} // End Class