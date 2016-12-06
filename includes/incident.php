<?php
require_once("database.php");

class Incident extends DatabaseObject {

	protected static $table_name="incident";
	protected static $db_fields = array('id', 'date', 'what', 'description', 'time');

	public $id;
	public $date;
	public $what;
	public $description;
    public $time;
	

	public static function make ($date, $what, $description, $time) {
		$incident = new Incident;

		$incident->id =(INT) 0;
		$incident->date= $date;
		$incident->what = $what;
		$incident->description = $description;
		$incident->time = $time;
        
  		return $incident;
	}
}
?>