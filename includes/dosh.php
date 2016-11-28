<?php
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'session.php');

class Dosh extends DatabaseObject {

	protected static $table_name = "dosh";
	protected static $db_fields=array('id', 'name', 'type', 'size', 'date');

	public $id;
	public $name;
	public $type;
	public $size;
	public $date;

	protected $temp_path;
	protected $upload_dir = "members/staff/files/dosh";
	public $errors = array();

	protected $upload_errors = array(
	  UPLOAD_ERR_OK   => "No errors.",
	  UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize",
	  UPLOAD_ERR_FORM_SIZE => "LArger than form MAX_FILE_SIZE.",
	  UPLOAD_ERR_PARTIAL  => "Partial upload.",
	  UPLOAD_ERR_NO_FILE  => "No file.",
	  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
	  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
	  UPLOAD_ERR_EXTENSION  => "File upload stopped by extension"
	);

	//Pass in $_FILE(['uploaded_file']) as an argument
	public function attach_file($file, $dosh_name, $date) {
		//perform error checking on the form parameters
		if (!$file || empty($cv_name) || empty($file) || !is_array($file)) {
			//error: nothing uploaded or the fprm parameters
			$this->errors[] = "No file was uploaded.";
			return false;
		} elseif ($file['error'] != 0) {
			//error: report what PHP says went wrong
			$this->error[] = $this->upload_errors[$file['error']];
			return false;
		} else {
			//Set object attributes to the form parameters.

			$this->temp_path= $file['tmp_name'];
			$this->name 	= $dosh_name.basename($file['name']);
			$this->type 	= $file['type'];
			$this->size 	= $file['size'];
			$this->date 	= $date;

			//Don't worry about saving anything to the database yet.
			return true; 
		}
	}

	public function save() {
		//A new record wont have an id yet.
			//Can't save if there are errors
			if (!empty($this->errors)) {return false; }

			//Detemine the target_path
			$target_path = SITE_ROOT.DS.'public'.DS.$this->upload_dir.DS.$this->file_name;

			//make sure the file doesnt already exist in the target folder
			if (file_exists($target_path)) {
				$this->errors[] = "The file {$this->file_name} already exists.";
				return false;
			}
			//attemt to move the file
			if (move_uploaded_file($this->temp_path, $target_path)) {
				//succes
				//Save a corresponding entry to the database
				if ($this->create()) {
					unset($this->temp_path);
					return $this->id;
				}
			} else {
				//failure
				$this->error[] = "The file upload failed, probably due to permissions on the upload folder.";
				return false;
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
		return $this->upload_dir.DS.$this->file_name;
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

?>