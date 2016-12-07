<?php
require_once("database.php");

class Payment extends DatabaseObject {

	protected static $table_name="payment";
	protected static $db_fields = array('id', 'date', 'site_name', 'type', 'amount');

	public $id;
	public $date;
	public $site_name;
	public $type;
	public $amount;
	

	public static function make ($date, $site_name, $type, $amount) {
		$payment = new Payment;

		$payment->id =(INT) 0;
		$payment->date = $date;
		$patment->site_name = $site_name;
		$payment->type = $type;
		$payment->amount = $amount;

  		return $payment;
	}
}
?>