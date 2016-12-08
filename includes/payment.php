<?php
require_once("database.php");

class Payment extends DatabaseObject {

	protected static $table_name="payment";
	protected static $db_fields = array('id', 'date', 'site_name', 'type', 'amount', 'nhif', 'nssf', 'other', 'other_exp');

	public $id;
	public $date;
	public $site_name;
	public $type;
	public $amount;
	public $nhif;
	public $nssf;
	public $other;
	public $other_exp;
	

	public static function make ($date, $site_name, $type, $amount, $nhif, $nssf, $other, $other_exp) {
		$payment = new Payment;

		$payment->id = (InT) 0;
		$payment->date = $date;
		$payment->site_name = $site_name;
		$payment->type = $type;
		$payment->amount = $amount;
		$payment->nhif = $nhif;
		$payment->nssf = $nssf;
		$payment->other = $other;
		$payment->other_exp = $other_exp;

		return $payment;
	}
}
?>