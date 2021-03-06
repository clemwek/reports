<?php
require_once("../../../includes/initialize.php");
//if (!$session->is_logged_in()) { redirect_to("login.php");}
?>
<?php
$location = '../../../includes/data.json';
?>

<section id="new_staff">
    <div class="form-group">
		<div class="control-label">
			<label for="" class="control-label"> Staff details: </label>
		</div>
		<div class="col-xs-6">
			<label for="first_name" class="sr-only">First name</label>
			<input type="text" name="first_name" class="form-control" id="first_name" placeholder="first name" value="" required>
			<p class="help-text small">Enter first name.</p>
			<span class="error"></span>
		</div>
		<div class="col-xs-6">
			<label for="last_name" class="sr-only">Last name</label>
			<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name" value="" required>
			<p class="help-text small">Enter last name.</p>
			<span class="error"></span>
		</div>
	</div>	
	<div class="form-group">
		<div class="control-label">
			<label for="" class="control-label"> Other details: </label>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<label for="national_id" class="sr-only">National ID</label>
				<input type="text" name="national_id" class="form-control" id="national_id" placeholder="National ID..." value="" required>
				<p class="help-text small">Enter staff national id.</p>
				<span class="error"></span>
			</div>
	    	<div class="col-xs-6">
				<label for="staff_phone_number" class="sr-only">Staff Phone number</label>
				<input type="text" name="staff_phone_number" class="form-control" id="staff_phone_number" placeholder="phone number..." value="" required>
				<p class="help-text small">Enter your phone number.</p>
				<span class="error"></span>
			</div>
			<div class="col-xs-4">
				<label for="nhif_number" class="sr-only">NHIF Number</label>
				<input type="text" name="nhif_number" class="form-control" id="nhif_number" placeholder="NHIF number..." value="" required>
				<p class="help-text small">Enter staff NHIF number.</p>
				<span class="error"></span>
			</div>
			<div class="col-xs-4">
				<label for="nssf_number" class="sr-only">NSSF Number</label>
				<input type="text" name="nssf_number" class="form-control" id="nssf_number" placeholder="NSSF number..." value="" required>
				<p class="help-text small">Enter staff NSSF number.</p>
				<span class="error"></span>
			</div>
	    	<div class="col-xs-4">
				<label for="kra_number" class="sr-only">KRA number</label>
				<input type="text" name="kra_number" class="form-control" id="kra_number" placeholder="kra number..." value="" required>
				<p class="help-text small">Enter staff kra number.</p>
				<span class="error"></span>
			</div>
			
	    	<div class="col-xs-12">
				<label for="bank_account" class="sr-only">bank account</label>
				<input type="text" name="bank_account" class="form-control" id="bank_account" placeholder="bank account..." value="" required>
				<p class="help-text small">Enter the bank account number.</p>
				<span class="error"></span>
			</div>
		</div>		
	</div>
</section>

<section id="accident_load">
	<div class="form-group">
		<div class="control-label">
			<label for="partics_of_injured" class="control-label"> particulars of the injured person: </label>
		</div>
		<div class="col-xs-6">
			<label for="" class="sr-only">Id number of the injured person</label>
			<input type="text" name="id_of_injured" class="form-control" id="id_of_injured" placeholder="Id number of the injured person" value="" required>
			<p class="help-text small">Enter the Id number of the injured person.</p>
			<span class="error"></span>
		</div>
		<div class="col-xs-6">
			<label for="nature_of_injured" class="sr-only">Nature of the injury</label>
			<input type="text" name="nature_of_injured" class="form-control" id="nature_of_injured" placeholder="Nature of the injury" value="" required>
			<p class="help-text small">Enter the Nature of the injury.</p>
			<span class="error"></span>
		</div>
	</div>
	<div class="form-group">
		<div class="control-label">
			<label for="" class="control-label"> Incident Description: </label>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<label for="body_part_injured" class="sr-only">Body part injured</label>
				<input type="text" name="body_part_injured" class="form-control" id="body_part_injured" placeholder="Body psrt injured" value="" required>
				<p class="help-text small">Enter the Body part injured.</p>
				<span class="error"></span>
			</div>
			<div class="col-xs-6">
				<label for="ext_of_injury" class="sr-only">Extend of the injury</label>
				<input type="text" name="ext_of_injury" class="form-control" id="ext_of_injury" placeholder="Extend of the injury" value="" required>
				<p class="help-text small">Enter the Extend of the injury.</p>
				<span class="error"></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<label for="incident_desc" class="sr-only">Describe the incident</label>
				<textarea type="text" name="incident_desc" class="form-control" id="incident_desc" placeholder="Describe the incident..." value="" required></textarea>
				<p class="help-text small">Describe the incident/accident.</p>
				<span class="error"></span>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="control-label">
			<label for="" class="control-label"> Measures taken after the incident: </label>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<label for="firstaid" class="sr-only">First aid</label>
				First aid offered: <input type="radio" name="first_aid" id="first_aid" value="1" required> Yes
				<input type="radio" name="first_aid" id="first_aid1" value="0" required> No
				<textarea name="firstaid_desc" class="form-control" id="firstaid_desc" placeholder="if yes, who gave the firsaid, if no why?..."   required></textarea>					
			</div>
			<div class="col-xs-6">
				<label for="" class="sr-only">Hospital</label>"
				Was he taken to hospital: <input type="radio" name="hospital" value="1" required> Yes
				<input type="radio" name="hospital" value="0" required> No
				<textarea type="text" name="hospital_desc" id="hospital_desc" class="form-control" id="hospital_desc" placeholder="if yes where and what time and if no, why..." required></textarea>				
			</div>
		</div><br/><br/>
		<div class="row">
			<div class="col-xs-6">
				<label for="accident_coments" class="sr-only">Staff coments on the incidents.</label>
				<textarea type="text" name="accident_coments" class="form-control" id="accident_coments" placeholder="Staff coments on the incidents...." value="" required></textarea>
				<p class="help-text small">Enter your coments about the incident.</p>
				<span class="error"></span>
			</div>
			<div class="col-xs-6">
				<label for="dosh" class="sr-only">Attach dobe sheet.</label>
				<input type="file" name="dosh" id="dosh" size="10000" required>
				<p class="help-text small">Attach dobe sheet.</p>
				<span class="error"></span>
			</div>
		</div>
	</div>
</section>

<section id="incident_load">
	<div class="form-group">
		<div class="control-label">
			<label for="" class="control-label"> Description of the incident: </label>
		</div>
		<div class="col-xs-6">
			<label for="short_incident_desc" class="sr-only">One sentence description of what happened</label>
			<input type="text" name="short_incident_desc" class="form-control" id="short_incident_desc" placeholder="One sentence description of what happened" value="">
			<p class="help-text small">One sentence description of what happened.</p>
			<span class="error"></span>
		</div>
		<div class="col-xs-6">
			<label for="" class="sr-only">Time of incident</label>
			<input type="time" name="incident_time" class="form-control" id="incident_time" placeholder="Time of incident" value="">
			<p class="help-text small">Time of incident.</p>
			<span class="error"></span>
		</div>
	</div>		
	<div class="form-group">
		<div class="control-label">
			<label for="" class="control-label"> Detailed description of the incident: </label>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<label for="incident_desc" class="sr-only">Describe the incident</label>
				<textarea type="text" name="incident_desc" class="form-control" id="incident_desc" placeholder="Describe the incident..." value=""></textarea>
				<p class="help-text small">Describe the incident.</p>
				<span class="error"></span>
			</div>
		</div>				
	</div>
</section>

<section id="cat_load">
	<div class="row">
		<div class="form-group">
			<div class="control-label">
				<label for="" class="control-label"> Categories: </label>
			</div>
			<div class="col-xs-6">
				<label for="" class="sr-only">Select the category:</label>
				<select class="btn-block form-control" name="emp_cat" id="emp_cat" required>
					<option>Select the category:</option>
					<?php
					$cats = load_json('../../../includes/data.json');
					$output = "";
					foreach ($cats['categories'] as $cat) {
						$output .= "<option>{$cat}</option>";
					}
					echo $output;
					?>
				</select>
				<p class="help-text small">job category of the employee.</p>
				<span class="error"><?php echo isset($emp_cat_error) ? $emp_cat_error : false; ?></span>
			</div>
			<div class="col-xs-6">
				<label for="" class="sr-only">Number Of employees.</label>
				<input type="number" name="no_emp_cat" class="form-control" id="no_emp_cat" placeholder="Number Of employees." value="" required>
				<p class="help-text small">Number Of employees..</p>
				<span class="error"><?php echo isset($no_emp_cat_error) ? $no_emp_cat_error : false; ?></span>
			</div>
			<!--<div class="col-xs-12">
				<button class="btn btn-success glyphicon glyphicon-plus" id="add_emp_cat">Add another category</button>
			</div>-->
		</div>
	</div>
</section>

<section id="dep_load">
	<div class="row">
		<div class="form-group">
			<div class="control-label">
				<label for="" class="control-label"> Department: </label>
			</div>
			<div class="col-xs-6">
				<?php 
					$array = load_json($location);
					
					if ($array['departments'][$session->site_name]) {
						echo '<h4>Already added deps</h4>';
						foreach ($array['departments'][$session->site_name] as $dep) {
							echo '<li>'.$dep.'</li>';
						}
					} else {
						echo 'No department is added!';
					}
					
				?>
			</div>
			<div class="col-xs-6">
				<label for="" class="sr-only">Name of the department.</label>
				<input type="text" name="department" class="form-control" id="department" placeholder="Departmant." value="" required>
				<p class="help-text small">Enter the name of the department.</p>
				<span class="error"><?php echo isset($no_emp_cat_error) ? $no_emp_cat_error : false; ?></span>
			</div>
			<!--<div class="col-xs-12">
				<button class="btn btn-success glyphicon glyphicon-plus" id="add_emp_cat">Add another category</button>
			</div>-->
		</div>
	</div>
</section>

<section id="addCat_load">
	<div class="row">
		<div class="form-group">
			<div class="control-label">
				<label for="" class="control-label"> Category: </label>
			</div>
			<div class="col-xs-6">
				<?php 
					$array = load_json($location);
					
					if ($array['categories'][$session->site_name]) {
						echo '<h4>Already added deps</h4>';
						foreach ($array['departments'][$session->site_name] as $dep) {
							echo '<li>'.$dep.'</li>';
						}
					} else {
						echo 'No Categories is added!';
					}
					
				?>
			</div>
			<div class="col-xs-6">
				<label for="" class="sr-only">Name of the categoty.</label>
				<input type="text" name="category" class="form-control" id="category" placeholder="Category." value="" required>
				<p class="help-text small">Enter the name of the category.</p>
				<span class="error"><?php echo isset($no_emp_cat_error) ? $no_emp_cat_error : false; ?></span>
			</div>
			<!--<div class="col-xs-12">
				<button class="btn btn-success glyphicon glyphicon-plus" id="add_emp_cat">Add another category</button>
			</div>-->
		</div>
	</div>
</section>

<section id="payment_load">
	<div class="row">
		<div class="form-group">
			<div class="control-label">
				<label for="" class="control-label"> Payment: </label>
			</div>
			<div class="col-xs-4">
				<label for="department_name" class="sr-only">Select department</label>
				<select class="btn-block form-control" name="department_name" id="department_name" required>
					<option>List of departments:</option>
					<option>Engineering</option>
					<option>Administration</option>
					<option>Finance</option>
					<option>Casual</option>
				</select>
				<p class="help-text small">Choose the department.</p>
				<span class="error"><?php echo isset($pod_error) ? $pod_error : false; ?></span>
			</div>
			<div class="col-xs-2">
				<label for="invoice_amount" class="sr-only">Invoiced Amount</label>
				<input type="number" name="invoice_amount" class="form-control" id="invoice_amount" placeholder="invoice amount" value="" required>
				<p class="help-text small">Invoiced amount.</p>
				<span class="error"><?php echo isset($amount_payment_error) ? $amount_payment_error : false; ?></span>
			</div>
			<div class="col-xs-2">
				<label for="basic_salary" class="sr-only">Basic Salary </label>
				<input type="number" name="basic_salary" class="form-control" id="basic_salary" placeholder="Basic Salary" value="" required>
				<p class="help-text small">Enter amount paid for basic salary.</p>
				<span class="error"><?php echo isset($nhif_payment_error) ? $nhif_payment_error : false; ?></span>
			</div>
			<div class="col-xs-2">
				<label for="house_allowence" class="sr-only">House allowence</label>
				<input type="number" name="house_allowence" class="form-control" id="house_allowence" placeholder="house allowence" value="" required>
				<p class="help-text small">Enter amount paid for house allowence.</p>
				<span class="error"><?php echo isset($nssf_payment_error) ? $nssf_payment_error : false; ?></span>
			</div>
			<div class="col-xs-2">
				<label for="advence" class="sr-only">Advence</label>
				<input type="number" name="advence" class="form-control" id="advence" placeholder="Advence" value="" required>
				<p class="help-text small">Enter amount paid for advence.</p>
				<span class="error"><?php echo isset($other_payment_error) ? $other_payment_error : false; ?></span>
			</div>
		
			<div class="col-xs-3">
				<label for="ot1" class="sr-only">OT 1</label>
				<input type="number" name="ot1" class="form-control" id="ot1" placeholder="ot1" value="" required>
				<p class="help-text small">Enter number of hours for OT.</p>
				<span class="error"><?php echo isset($nssf_payment_error) ? $nssf_payment_error : false; ?></span>
			</div>
			<div class="col-xs-3">
				<label for="ot1_amount" class="sr-only">OT 1 Amount</label>
				<input type="number" name="ot1_amount" class="form-control" id="ot1_amount" placeholder="ot1_amount" value="" required>
				<p class="help-text small">Enter amount for hours for OT.</p>
				<span class="error"><?php echo isset($nssf_payment_error) ? $nssf_payment_error : false; ?></span>
			</div>
			<div class="col-xs-3">
				<label for="ot2" class="sr-only">OT 2</label>
				<input type="number" name="ot2" class="form-control" id="ot2" placeholder="ot2" value="" required>
				<p class="help-text small">Enter number of hours for OT 2.</p>
				<span class="error"><?php echo isset($nssf_payment_error) ? $nssf_payment_error : false; ?></span>
			</div>
			<div class="col-xs-3">
				<label for="ot2_amount" class="sr-only">OT 2 Amount</label>
				<input type="number" name="ot2_amount" class="form-control" id="ot2_amount" placeholder="ot2_amount" value="" required>
				<p class="help-text small">Enter amount for hours for OT 2.</p>
				<span class="error"><?php echo isset($nssf_payment_error) ? $nssf_payment_error : false; ?></span>
			</div>
		
			<div class="col-xs-6">
				<label for="days_absent" class="sr-only">Days Absent</label>
				<input type="number" name="days_absent" class="form-control" id="days_absent" placeholder="days absent" value="" required>
				<p class="help-text small">Enter the number of days absent.</p>
				<span class="error"><?php echo isset($other_payment_error) ? $other_payment_error : false; ?></span>
			</div>
			<div class="col-xs-6">
				<label for="number_of_staff" class="sr-only">Number Of Staff</label>
				<input type="number" name="number_of_staff" class="form-control" id="number_of_staff" placeholder="number of staff" value="" required>
				<p class="help-text small">Enter the number of staff.</p>
				<span class="error"><?php echo isset($other_payment_error) ? $other_payment_error : false; ?></span>
			</div>
		</div>
	</div>
</section>