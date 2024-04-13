<?php


/**
 * 
 */
class User
{
	protected static $instance;
	function __construct()
	{
		// code...
	}

	public static function action()
	{
		if (!self::$instance) {
			
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function create($value='')
	{
		// code...
	}

	public function update_by_id($values, $id)
	{
		return DB::table('users')->update($values)->where("id = :id",["id" => $id]);
	}

	public function get_all()
	{
		return DB::table('users')->select()->all();
	}

	// public function get_by_id($id)
	// {
	// 	return DB::table('users')->select()->where("id = :id",["id" => $id]);
	// }

	// public function get_by_email($email)
	// {
	// 	return DB::table('users')->select()->where("email = :email",["email" => $email]);
	// }

	public function __call($method, $param)
	{
		$value = $param[0];
		$column = str_replace("get_by_", "", $method);
		$column = addslashes($column);
		return DB::table('users')->select()->where($column . "= :".$column,[$column => $value ]);
	}



} // End Class