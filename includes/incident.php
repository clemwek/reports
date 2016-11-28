<?php
require_once("database.php");

class Incident extends DatabaseObject {

	protected static $table_name="incident";
	protected static $db_fields = array('id', 'rep_id', 'what', 'description', 'time');

	public $id;
	public $rep_id;
	public $what;
	public $description;
    public $time;
	

	public static function make ($rep_id, $what, $description, $time) {
		$incident = new Incident;

		$incident->id =(INT) 0;
		$incident->rep_id = $rep_id;
		$incident->what = $what;
		$incident->description = $description;
		$incident->time = $time;
        
  		return $incident;
	}
}
?>