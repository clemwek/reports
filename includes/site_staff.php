<?php
require_once("database.php");

class Site_staff extends DatabaseObject {

	protected static $table_name="site_staff";
	protected static $db_fields = array('id', 'date', 'site_name', 'first_name', 'last_name', 'id_number', 'phone_number', 'nssf_number', 'nhif_number', 'kra_number', 'bank_account');

	public $id;
	public $date;
	public $site_name;
	public $first_name;
	public $last_name;
	public $id_number;
	public $phone_number;
	public $nssf_number;
	public $nhif_number;
	public $kra_number;
	public $bank_account;
	


	public static function make ($id, $date, $site_name, $first_name, $last_name, $id_number, $phone_number, $nhif_number, $nssf_number, $kra_number, $bank_account) {
		$site_staff = new Site_staff;

		$site_staff->id =(INT) $id;
		$site_staff->date = $date;
		$site_staff->site_name = $site_name;
		$site_staff->first_name = $first_name;
		$site_staff->last_name = $last_name;
		$site_staff->id_number = $id_number;
		$site_staff->phone_number = $phone_number;
		$site_staff->nssf_number = $nssf_number;
		$site_staff->nhif_number = $nhif_number;
		$site_staff->kra_number = $kra_number;
		$site_staff->bank_account = $bank_account;

  		return $site_staff;
	}



}
?>