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
	

	public static function make ($id, $date, $site_name, $name, $number) {
		$cat = new Cat;

		//pass the variables
		$cat->id = (INT) $id;
		$cat->date = $date;
		$cat->site_name = $site_name;
		$cat->name = $name;
		$cat->number = $number;

		return $cat;
	}
}
?>