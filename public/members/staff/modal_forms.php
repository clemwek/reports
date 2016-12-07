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
	<div class="form-group">
		<div class="control-label">
			<label for="" class="control-label"> Categories: </label>
		</div>
		<div class="col-xs-6">
			<label for="" class="sr-only">Select the category:</label>
			<select class="btn-block form-control" name="emp_cat" id="emp_cat">
				<option>Select the category:</option>
				<option>Machine Attendant</option>
				<option>Machine Operator</option>
				<option>Cleaners</option>
				<option>Others</option>
			</select>
			<p class="help-text small">job category of the employee.</p>
			<span class="error"><?php echo isset($emp_cat_error) ? $emp_cat_error : false; ?></span>
		</div>
		<div class="col-xs-6">
			<label for="" class="sr-only">Number Of employees.</label>
			<input type="number" name="no_emp_cat" class="form-control" id="no_emp_cat" placeholder="Number Of employees." value="">
			<p class="help-text small">Number Of employees..</p>
			<span class="error"><?php echo isset($no_emp_cat_error) ? $no_emp_cat_error : false; ?></span>
		</div>
		<div class="col-xs-12">
			<button class="btn btn-success glyphicon glyphicon-plus" id="add_emp_cat">Add another category</button>
		</div>
	</div>
</section>

<section id="payment_load">
	<div class="control-label">
		<label for="" class="control-label"> Payment: </label>
	</div>
	<div class="col-xs-3">
		<label for="" class="sr-only">Select type of payment</label>
		<select class="btn-block form-control" name="payment" id="payment">
			<option>Type of payment:</option>
			<option>Wages</option>
			<option>Allowance</option>
			<option>Salaries</option>
			<option>Others</option>
		</select>
		<p class="help-text small">Number Of male employees.</p>
		<span class="error"><?php echo isset($pod_error) ? $pod_error : false; ?></span>
	</div>
	<div class="col-xs-3">
		<label for="" class="sr-only">Amount paid</label>
		<input type="number" name="amount_payment" class="form-control" id="amount_payment" placeholder="Amount paid" value="">
		<p class="help-text small">Amount paid.</p>
		<span class="error"><?php echo isset($amount_payment_error) ? $amount_payment_error : false; ?></span>
	</div>
	<div class="col-xs-2">
		<label for="" class="sr-only">NHIF </label>
		<input type="number" name="nhif_payment" class="form-control" id="nhif_payment" placeholder="NHIF" value="">
		<p class="help-text small">Enter amount paid for NHIF.</p>
		<span class="error"><?php echo isset($nhif_payment_error) ? $nhif_payment_error : false; ?></span>
	</div>
	<div class="col-xs-2">
		<label for="" class="sr-only">NSSF payment</label>
		<input type="number" name="nssf_payment" class="form-control" id="nssf_payment" placeholder="NSSF" value="">
		<p class="help-text small">Enter NSSF payment.</p>
		<span class="error"><?php echo isset($nssf_payment_error) ? $nssf_payment_error : false; ?></span>
	</div>
	<div class="col-xs-2">
		<label for="" class="sr-only">Other payment</label>
		<input type="number" name="other_payment" class="form-control" id="other_payment" placeholder="Other payment" value="">
		<p class="help-text small">Enter other payment.</p>
		<span class="error"><?php echo isset($other_payment_error) ? $other_payment_error : false; ?></span>
	</div>
	<div class="col-xs-12">
		<button class="btn btn-success glyphicon glyphicon-plus" id="add_payment">Add another payment</button>
	</div>
</section>