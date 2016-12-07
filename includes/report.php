<?php
require_once("database.php");

class Report extends DatabaseObject {

	protected static $table_name="report";
	protected static $db_fields = array('id', 'date', 'present', 'absent', 'leave_no', 'female', 'male', 'new', 'site_name', 'IMC_staff_id');

	public $id;
	public $date;
	public $present;
	public $absent;
    public $leave_no;
	public $female;
	public $male;
	public $new;
	public $site_name;
	public $IMC_staff_id;
	

	public static function make ($date, $present, $absent, $leave_no, $female, $male, $new, $site_name, $IMC_staff_id) {
		$report = new Report;

		$report->id =(INT) 0;
		$report->date = $date;
		$report->present = $present;
		$report->absent = $absent;
		$report->leave_no = $leave_no;
		$report->female = $female;
		$report->male = $male;
		$report->new = $new;
		$report->site_name = $site_name;
		$report->IMC_staff_id = $IMC_staff_id;
        
  		return $report;
	}
}
?>