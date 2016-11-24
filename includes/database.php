<?php
require_once("initialize.php");


class MySQLDatabase extends DatabaseObject {
	
	private $connection;
	public  $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
	//when this class is initialised these will be done automatically
	function __construct() {
		$this->open_connection();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists( "mysqli_real_escape_string" ); 
	}

	//open the connection 
  	//if there is a connection select a database
	public function open_connection() {
		try {
		$this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		} catch (Exception $e) {
			echo "Something went wrong".$e;
		}
		// if (mysqli_connect_errno()) {
		// 	die ("Database connection failed: ".mysqli_connect_error()." (".mysqli_connect_errno().")"
		// 	);
		// }
	}

	//close the connection
	public function close_connection() {
		if(isset($this->connection)) {
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}

	//query the database confirm the result and return the results
	public function query($sql) {
		$this->last_query = $sql;
		try {
			$result = mysqli_query($this->connection, $sql);
			$this->confirm_query($result);
			return $result;
		} catch (Exception $e) {
			echo "Something went wrong".$e;
		}	
	}
	
	//This will escap the values for input to the database to avoid injection
	public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysqli_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysqli_real_escape_string($this->connection, $value);
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	
	//confirms if there was a database query result
	//gives the the last sql query
	private function confirm_query($result) {
		if (!$result) {
			$output = "Database query failed: ". mysqli_error($this->connection)."<br/>";
			$output .= "Last SQL query: ".$this->last_query;
			die($output);
		}
	}

	// "database-neutral" methods
	public function fetch_array($result_set) {
		return mysqli_fetch_array($result_set);
	}

	//It returns the number of rows in a result
	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
	}
	
	//retuns the last id   
	public function insert_id() {
		// get the last id inserted over the current db connection
		return mysqli_insert_id($this->connection);
	}
	
	//the number of the rows that were affected 
	public function affected_rows() {
		return mysqli_affected_rows($this->connection);
	}
}

$database = new MySQLDatabase();
$db =& $database;
?>