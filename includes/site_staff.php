<?php
require_once("database.php");

class Site_staff extends DatabaseObject {

	protected static $table_name="site_staff";
	protected static $db_fields = array('id', 'date', 'site_name', 'first_name', 'last_name', 'id_number', 'phone_number');

	public $id;
	public $date;
	public $site_name;
	public $first_name;
	public $last_name;
	public $id_number;
	public $phone_number;
	


	public static function make ($date, $site_name, $first_name, $last_name, $id_number, $phone_number) {
		$site_staff = new Site_staff;

		$site_staff->id =(INT) 0;
		$site_staff->date = $date;
		$site_staff->site_name = $site_name;
		$site_staff->first_name = $first_name;
		$site_staff->last_name = $last_name;
		$site_staff->id_number = $id_number;
		$site_staff->phone_number = $phone_number;

  		return $site_staff;
	}



}
?>