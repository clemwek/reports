<?php
require_once("database.php");

class Accident extends DatabaseObject {

	protected static $table_name="accident";
	protected static $db_fields = array('id', 'date', 'staff_id', 'dosh_id', 'nature_of_injury', 'body_part_injury', 'extent_of_injury', 'description', 'first_aid', 'hospital', 'first_aid_explain', 'hospital_explain', 'coment');

	public $id;
	public $date;
	public $staff_id;
	public $dosh_id;
    public $nature_of_injury;
	public $body_part_injury;
	public $extent_of_injury;
	public $description;
	public $first_aid;
	public $hospital;
	public $first_aid_explain;
	public $hospital_explain;
	public $coment;
	

	public static function make ($date, $staff_id, $dosh_id, $nature_of_injury, $body_part_injury, $extent_of_injury, $description, $first_aid, $hospital, $first_aid_explain, $hospital_explain, $coment) {
		$accident = new Accident;

		$accident->id =(INT) 0;
		$accident->date = $date;
		$accident->staff_id = $staff_id;
		$accident->dosh_id = $dosh_id;
		$accident->nature_of_injury = $nature_of_injury;
		$accident->fembody_part_injuryale = $body_part_injury;
		$accident->extent_of_injury = $extent_of_injury;
		$accident->description = $description;
		$accident->first_aid = $first_aid;
		$accident->hospital = $hospital;
		$accident->first_aid_explain = $first_aid_explain;
		$accident->hospital_explain = $hospital_explain;
		$accident->coment = $coment;
        
  		return $accident;
	}
}
?>