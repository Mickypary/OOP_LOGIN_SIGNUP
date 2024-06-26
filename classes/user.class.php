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

	public function create($POST)
	{
		$errors = array();

		$arr['username'] = ucwords(trim($POST['username']));
		$arr['email'] = trim($POST['email']);
		$arr['password'] = $POST['password'];
		$arr['gender'] = trim($POST['gender']);
		$arr['date'] = date("Y-m-d H:i:s");

		// validation
		if (empty($arr['username']) || !preg_match("/^[a-zA-Z ]+$/", $arr['username'])) {
			
			$errors[] = "Username can only have letters and spaces";
		}


		if (!filter_var($arr['email'], FILTER_VALIDATE_EMAIL)) {
					
			$errors[] = "Please enter a valid email";
		}

		if (empty($arr['password']) || strlen($arr['password']) < 4) {
					
			$errors[] = "Password must be atleast 4 characters";
		}

		if ($arr['gender'] != "Female" && $arr['gender'] != "Male") {
							
			$errors[] = "Please enter a valid gender";
		}


		// save to database
		if (count($errors) == 0) {
			
			return DB::table('users')->insert($arr);
		}
		// echo "error";
		return $errors;

	}

	public function login($POST)
	{
		$errors = array();

		$arr['email'] = trim($POST['email']);
		$password = $POST['password'];

		// read from database
		$data =  DB::table('users')->select()->where("email = :email",$arr);
		
		if (is_array($data)) {
			$data = $data[0];
			if ($data->password == $password) {

				// regenerate session id

				$sess = new Session();
				$sess->regenerate();

				$arr['user_id'] = $data->id;
				$arr['username'] = $data->username;
				$arr['email'] = $data->email;
				$arr['logged_in'] = true;

				// defined function by me in session class
				$set_session = $sess->set("USER", $arr);

				return true;

			}
			
		}

		$errors[] = "wrong email or password";
		// echo "error";
		return $errors;

	}

	public function update_by_id($values, $id)
	{
		return DB::table('users')->update($values)->where("id = :id",["id" => $id]);
	}

	public function get_all()
	{
		return DB::table('users')->select()->all();
	}

	public function __call($method, $param)
	{
		$value = $param[0];
		$column = str_replace("get_by_", "", $method);
		$column = addslashes($column);

		// check if column exist
		$check = DB::table('users')->query('show columns from users');
		$all_columns = array_column($check, "Field");
		if (in_array($column, $all_columns)) {
			
			return DB::table('users')->select()->where($column . "= :".$column,[$column => $value ]);
		}

		return false;
		
	}


	public function is_logged_in()
	{
		$sess = new Session();
		if ($sess->exists('USER')) {
			$data = $sess->get('USER');
			$email = $data['email'];

			// read from database
			$data =  $this->get_by_email($email);
			
			if (is_array($data)) {
					return true;				
			}
		}

		return false;
	}



} // End Class