<?php
require_once("database.php");

class Incident extends DatabaseObject {

	protected static $table_name="incident";
	protected static $db_fields = array('id', 'date', 'site_name', 'what', 'description', 'time');

	public $id;
	public $date;
	public $site_name;
	public $what;
	public $description;
    public $time;
	

	public static function make ($date, $site_name, $what, $description, $time) {
		$incident = new Incident;

		$incident->id = (INT) 0;
		$incident->date = $date;
		$incident->site_name = $site_name;
		$incident->what = $what;
		$incident->description = $description;
		$incident->time = $time;

		return $incident;
	}
}
?>