<?php
require_once("database.php");

class Payment extends DatabaseObject {

	protected static $table_name="payment";
	protected static $db_fields = array('id', 'rep_id', 'type', 'amount');

	public $id;
	public $rep_id;
	public $type;
	public $amount;
	

	public static function make ($rep_id, $type, $amount) {
		$payment = new Payment;

		$payment->id =(INT) 0;
		$payment->rep_id = $rep_id;
		$payment->type = $type;
		$payment->amount = $amount;

  		return $payment;
	}
}
?>