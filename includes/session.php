<?php
//A class to help work with Sessions
//In our case, primarily to manage logging users in and out

//Keep in mind when working with sessions that it is generally
//inadvisable to store DB-related objects in sessions
class Session {

	private $logged_in=false;
	public  $user_id;
	public 	$usertype;
	public 	$message;

	function __construct() {
		session_start();
		$this->check_message();
		$this->check_login();
		if ($this->logged_in) {
			//action to take right away if user is logged in
		} else {
			//action to take right away if user is not logged in
		}
	}

	public function is_logged_in() {
		return $this->logged_in;
	}

	public function login ($user) {
		//database should find user based on username/password
		if ($user) {
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->usertype = $_SESSION['usertype'] = $user->type;
			$this->logged_in = true;
		}
	}

	private function check_login() {
		if (isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->usertype = $_SESSION['usertype'];
			$this->logged_in = true;
		} else {
			unset($this->user_id);
			unset($this->usertype);
			$this->logged = false;
		}
	}

	public function logout() {
		unset($_SESSION['user_id']);
		unset($this->user_id);
		unset($_SESSION['usertype']);
		unset($this->usertype);
		session_destroy();
		$this->logged_in = false;
	}

	public function message() {
		if (!empty($msg="")) {
			//then this is "set message"
			//make sure you understand why $this->message=$msg wouldn't work
			$_SESSION['message'] = $msg;
		} else {
			//then this is "get message"
			return $this->message;
		}
	}

	private function check_message() {
		//is there a message stoerd in the session?
		if (isset($_SESSION['message'])) {
			$this->message = $_SESSION['message'];
			unset($_SESSION['message']);
		} else {
			$this->message = "";
		}
	}

	public function user_redirect($usertype) {
		if ($usertype=="superadmin") {
	        redirect_to("admin/index.php");
	    } elseif ($usertype=="admin" || $usertype=="Admin") {
	        redirect_to("analyst/index.php");
	    } elseif ($usertype=="staff" || $usertype=="Staff") {
	        redirect_to("staff/index.php");
	    }  
	}
	
	public static function exits ($name) {
		return (isset($_SESSION[$name])) ? true : false;
	}
	
	public static function put($name, $value) {
		return$_SESSION[$name] = $value;
	}
	
	public static function get ($name) {
		return $_SESSION[$name];
	}
	
	public static function delete ($name) {
		if (self::exits ($name)) {
			unset($_SESSION[$name]);
		}
	}
	
	public static function flash ($name, $string='') {
		if (self::exists($name)) {
			$session = self::get($name);
			self::delete($name);
			return $session;
		} else {
			self::put($name, $string);
		}
	}
}

$session = new Session();
$message = $session->message();
?>
