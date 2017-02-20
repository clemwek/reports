<?php
require_once(LIB_PATH.DS."config.php");

class DatabaseObject {
	
	//Common database methods
	//http://www.php.net/lsb
	
	//Find all enties in the database
	public static function find_all() {
		try {
			return static::find_by_sql("SELECT * FROM ".static::$table_name);
		} catch (Exception $e) {
			echo "Something went wrong".$e;
		}	
	}

	// Find all users with a user id
	public static function find_all_user_id($user_id=0) {
		global $database;
		return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE user_id = ".$database->escape_value($user_id));
	}

	// find by id
	public static function find_by_id($id=0) {
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id = ".$database->escape_value($id)." LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	// find by user id
	public static function find_by_user_id($user_id=0) {
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE user_id = ".$database->escape_value($user_id)." LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	// find all with date
	public static function find_for_date($date) {
		global $database;
		// return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE date = ".$database->escape_value($date));

		$sql = "SELECT * FROM ".static::$table_name." WHERE date = '".$date."'";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	// find all with date
	public static function find_all_for_date($date) {
		global $database;
		// return static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE date = ".$database->escape_value($date));

		$sql = "SELECT * FROM ".static::$table_name." WHERE date = '".$date."'";
		return static::find_by_sql($sql);
	}

	// find by sql
	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			$object_array[] = static::instantiate($row);
		}
		return $object_array;
	}	

	// Count all entries in the table
	public static function count_all() {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".static::$table_name;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}	

	// Count all in a field
	public static function count_all_in($field) {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".static::$table_name;
		$sql .= " Where category='".$field."'";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}	

	// Count all on a certain date
	public static function count_all_on_date($date) {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".static::$table_name;
		$sql .= " Where date ='".$date."'";
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	// Creates an instance of a class
	private static function instantiate($record) {
		$class_name = get_called_class();
		$object = new $class_name;

		foreach ($record as $attribute => $value) {
			if ($object ->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}

	private function has_attribute($attribute) {
		//get_object_vars returns an associative array with al attributes
		//(incl. private ones!) as the keys and thier current values as thier value
		$object_vars = $this->attributes();
		//We don't care about the value, we just want to know if the key exists
		//will return true or faulse
		return array_key_exists($attribute, $object_vars);
	}

	protected function attributes() {
		//return an array of attribute keys and there values
		$attributes = array();
		foreach (static::$db_fields as $field) {
			if (property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	protected function sanitized_attributes() {
		global $database;
		//sanitized the values before submiting
		//Note: does not alter the actual value of each attribute
		foreach ($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $database->escape_value($value);
		}
		return $clean_attributes; 
	}

	public function save() {
		//A new record won't have an id yet.
		return ($this->id!=0) ? $this->update() : $this->create() ;
	}

	public function check_save() {
		//A new record won't have an id yet.
		return isset($this->user_id) ? $this->update() : $this->create() ;
	}

	public function create() {
		global $database;
		//Don't forget your SQL syntax and good habits:
		//INSERT INTO table (key, key) VALUES ('value', 'value')
		//single-quotes around all values
		//escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".static::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		if ($database->query($sql)) {
			$this->id = $database->insert_id();
			return true; 
		} else {
			return false;
		}

	}

	public function update() {
		global $database;
		//Don't forget your SQL syntax and good habits:
		//-UPDATE table SET key='value', key='value' WHERE condition
		//single-quotes around all values
		//escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
 		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}

		$sql = "UPDATE ".static::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=".$database->escape_value($this->id);
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		//Don't forget your SQL syntax and good habits:
		//DELETE FROM table WHERE condition LIMIT 1
		//single-quotes around all values
		//escape all values to prevent SQL injection
		$sql = "DELETE FROM ".static::$table_name." ";
		$sql .= "WHERE id=". $database->escape_value($this->id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function attach_file($file, $file_name) {
		//perform error checking on the form parameters
		if (!$file || empty($file_name) ||  empty($file) || !is_array($file)) {
			//error: nothing uploaded or the fprm parameters
			$this->errors[] = "No file was uploaded.";
			return false;
		} elseif ($file['error'] != 0) {
			//error: report what PHP says went wrong
			$this->error[] = $this->upload_errors[$file['error']];
			return false;
		} else {
			//Set object attributes to the form parameters.

			$this->temp_path = $file['tmp_name'];
			$this->filename = basename($file['name']);
			$this->type 	= $file['type'];
			$this->size 	= $file['size'];

			//Don't worry about saving anything to the database yet.
			return true; 
		}
	}

	public function save_file() {
		//A new record wont have an id yet.
		if($this->id!=0) {
			//Really just to update the caption
			$this->update();
		} else {
			//Mate sure there are no errors 

			//Can't save if there are errors
			if (!empty($this->errors)) {return false; }

			//Detemine the target_path
			$target_path = SITE_ROOT.DS.'public'.DS.'members'.DS.$this->upload_dir.DS.$this->filename;

			//make sure the file doesnt already exist in the target folder
			if (file_exists($target_path)) {
				$this->errors[] = "The file {$this->filename} already exists.";
				return false;
			}

			//attemt to move the file
			if (move_uploaded_file($this->temp_path, $target_path)) {
				//succes
				//Save a corresponding entry to the database
				if ($this->create()) {
				unset($this->temp_path);
				return true;
				}
			} else {
				//failure
				$this->error[] = "The file upload failed, probably due to permissions on the upload folder.";
				return false;
			}
			
		}
	}

	public function destroy() {
		//First remove the database entry
		if ($this->delete()){
			//then remove the file
			$target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
			return unlink($target_path) ? true : false;
		} else {
			//database delete failed
			return false;
		}
	}

	public function image_path() {
		return $this->upload_dir.DS.$this->filename;
	}

	public function size_as_text() {
		if ($this->size < 1024) {
			return "{$this->size} bytes";
		} elseif ($this->size < 1048576) {
			$size_kb = round($this->size/1024);
			return "{$size_kb} KB";
		} else {
			$size_mb = round($this->size/1048576, 1);
			return "{$size_mb} MB";
		}
	}




}