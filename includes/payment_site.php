<?php
require_once("database.php");

class Payment_site extends DatabaseObject {

	protected static $table_name="payment_site";
	protected static $db_fields = array('id', 'date', 'site_name', 'department', 'invoiced_amount', 'basic_salary', 'house_allawance', 'advance', 'OT1hours', 'OT1amount', 'OT2hours', 'OT2amount', 'absent_days', 'number_of_staff');

	public $id;
	public $date;
	public $site_name;
	public $department;
	public $invoiced_amount;
	public $basic_salary;
	public $house_allawance;
	public $advance;
	public $OT1hours;
    public $OT1amount;
    public $OT2hours;
    public $OT2amount;
    public $absent_days;
    public $number_of_staff;
	

	public static function make ($id, $date, $site_name, $department, $invoiced_amount, $basic_salary, $house_allawance, $advance, $OT1hours, $OT1amount, $OT2hours, $OT2amount, $absent_days, $number_of_staff) {
		$payment = new Payment_site;

		$payment->id = (INT) $id;
		$payment->date = $date;
		$payment->site_name = $site_name;
		$payment->department = $department;
		$payment->basic_salary = $basic_salary;
		$payment->invoiced_amount = $invoiced_amount;
		$payment->house_allawance = $house_allawance;
		$payment->advance = $advance;
		$payment->OT1hours = $OT1hours;
        $payment->OT1amount = $OT1amount;
        $payment->OT2hours = $OT2hours;
        $payment->OT2amount = $OT2amount;
        $payment->absent_days = $absent_days;
        $payment->number_of_staff = $number_of_staff;


		return $payment;
	}
}
?>