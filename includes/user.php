<?php
require_once("database.php");

class User extends DatabaseObject {

	protected static $table_name="user";
	protected static $db_fields = array('id', 'username', 'password', 'first_name', 'last_name', 'id_number', 'phone_number', 'email', 'site', 'type');

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $id_number;
	public $phone_number;
	public $email;
	public $site;
	public $type;

	public static function make($fname, $lname, $uname, $pword, $id_number, $pnumber, $email, $site, $type) {
			$user = new User();

			$user->id = (INT) 0;
			$user->first_name = $fname;
			$user->last_name = $lname;
			$user->username = $uname;
			$user->password = $pword;
			$user->id_number = $id_number;
			$user->phone_number = $pnumber;
			$user->email = $email;
			$user->site = $site;
			$user->type = $type;

			return $user;
	}

	public static function authenticate($username="", $password="") {
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);

		$sql  = "SELECT * FROM users ";
		$sql .= "WHERE username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false ;
	}

	public static function username_exists($username="") {
		global $database;
		$username = $database->escape_value($username);

		$sql  = "SELECT * FROM users ";
		$sql .= "WHERE username = '{$username}' ";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? true : false ;
	}

	public static function email_exists($email="") {
		global $database;
		$email = $database->escape_value($email);

		$sql  = "SELECT * FROM users ";
		$sql .= "WHERE email = '{$email}' ";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? true : false ;
	}

	public function full_name() {
			if (isset($this->first_name) && isset($this->last_name))
				return $this->first_name . " " . $this->last_name;
		} //else {
			//return "";
		//}

	public function user_exists($username, $email) {
		global $database;

		$sql1 = "SELECT * FROM {$this->table_name} ";
		$sql1 .= "WHERE email = '$email' ";

		$sql = "SELECT * FROM {$this->table_name} ";
		$sql .= "WHERE username = '$username' ";
		
		if ($this->find_by_sql($sql) || $this->find_by_sql($sql1)) {
			return false;
		}
	}

	public function cvname () {
		if (isset($this->first_name) && isset($this->last_name)) {
			return $this->id."_".$this->first_name."_".$this->last_name;
		}
	}

	public static function find_all_status($status="Active") {
		global $database;
		return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE payment = '".$database->escape_value($status)."' ORDER BY id DESC");
	}


}



?>