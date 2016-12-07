<?php
require_once("database.php");

class Cat extends DatabaseObject {

	protected static $table_name="cat";
	protected static $db_fields = array('id', 'date', 'site_name', 'name', 'number');

	public $id;
	public $date;
	public $site_name;
	public $name;
	public $number;
	

	public static function make ($date, $site_name, $name, $number) {
		$cat = new Cat;

		$incident->id =(INT) 0;
		$incident->date = $date;
		$incident->site_name = $site_name;
		$incident->name = $name;
		$incident->number = $number;
        
  		return $cat;
	}
}
?>