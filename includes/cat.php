<?php
require_once("database.php");

class Cat extends DatabaseObject {

	protected static $table_name="cat";
	protected static $db_fields = array('id', 'rep_id', 'name', 'number');

	public $id;
	public $rep_id;
	public $name;
	public $number;
	

	public static function make ($rep_id, $name, $number) {
		$cat = new Cat;

		$incident->id =(INT) 0;
		$incident->rep_id = $rep_id;
		$incident->name = $name;
		$incident->number = $number;
        
  		return $cat;
	}
}
?>