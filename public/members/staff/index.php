<?php
require_once("../../../includes/initialize.php");
//if (!$session->is_logged_in()) { redirect_to("login.php");}
?>
<?php
// This brings in the user details
//$user = User::find_by_id($session->user_id);

//Find company details
//$employer = Employer::find_by_user_id($user->id);

?>
<?php include_layout_template('header.php'); ?>

	
	<!--<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">-->
		<!--<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>-->
		<!--<ul class="nav menu">
			<li class="active"><a href="profile.php"> Profile </a></li>
			<li><a href="jobs_posted.php"> Posted Jobs</a></li>
			<li><a href="#"> Applications Jobs</a></li>
		</ul>	
	</div>--><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"class="glyphicon glyphicon-home"></a></li>
				<li class="active">Profile (<?php //echo $user->full_name(); ?>)</li>
			</ol>
		</div><!--/.row -Bread crumbs-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Insight Report</h1>
			</div>
		</div><!--/.row -Page header-->
		
		<div class="row">
			<div class="col-lg-8 col-sm-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						 Insight report
					</div>
					<div class="panel-body">
						<form action="" enctype="multipart/form-data" method="post">
							<fieldset>
								<div class="form-group">
									<div class="control-label">
										<label for="" class="control-label"> Staff number: </label>
									</div>
									<div class="col-xs-4">
					                    <label for="" class="sr-only">Number Of employees present</label>
					                    Present: <input type="number" name="no_of_present" class="form-control" id="no_of_present" placeholder="Present" value="">
					                    <p class="help-text small">Enter number Of employees present.</p>
					                    <span class="error"><?php echo isset($no_of_present_error) ? $no_of_present_error : false; ?></span>
					                </div>
					                <div class="col-xs-4">
					                    <label for="" class="sr-only">Number Of employees absent</label>
					                    Absent: <input type="number" name="no_of_absent" class="form-control" id="no_of_absent" placeholder="Absent" value="">
					                    <p class="help-text small">Number Of employees absent.</p>
					                    <span class="error"><?php echo isset($no_of_absent_error) ? $no_of_absent_error : false; ?></span>
					                </div>
					                <div class="col-xs-4">
					                    <label for="" class="sr-only">Number Of employees on leave</label>
					                    Leave: <input type="number" name="no_of_leave" class="form-control" id="no_of_leave" placeholder="Leave" value="">
					                    <p class="help-text small">Number Of employees on leave.</p>
					                    <span class="error"><?php echo isset($no_of_leave_error) ? $no_of_leave_error : false; ?></span>
					                </div>
								</div>
								<div class="form-group">
									<div class="control-label">
										<label for="" class="control-label"> Gender: </label>
									</div>
					                <div class="col-xs-6">
					                    <label for="" class="sr-only">Number Of male employees</label>
					                    <input type="number" name="no_of_male" class="form-control" id="no_of_male" placeholder="Male" value="">
					                    <p class="help-text small">Number Of male employees.</p>
					                    <span class="error"><?php echo isset($no_of_male_error) ? $no_of_male_error : false; ?></span>
					                </div>
					                <div class="col-xs-6">
					                    <label for="" class="sr-only">Number Of female employees</label>
					                    <input type="number" name="no_of_female" class="form-control" id="no_of_female" placeholder="Female" value="">
					                    <p class="help-text small">Number Of female employees.</p>
					                    <span class="error"><?php echo isset($no_of_female_error) ? $no_of_female_error : false; ?></span>
					                </div>
								</div>
								<div class="form-group">
									<div class="control-label">
										<label for="" class="control-label"> New Staff: </label>
									</div>
					                <div class="col-xs-6">
					                    <label for="" class="sr-only">Number Of new employees</label>
					                    <input type="number" name="no_of_new" class="form-control" id="no_of_new" placeholder="New" value="">
					                    <p class="help-text small">Number Of new employees.</p>
					                    <span class="error"><?php echo isset($no_of_new_error) ? $no_of_new_error : false; ?></span>
					                </div>
					                <div class="col-xs-6">
										<label for="" class="sr-only">Number Of new employees</label>
					                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#newEmployee">Add new staff</button>
										<p class="help-text small">Number Of new employees.</p>
					                    <span class="error"></span>
					                </div>
								</div>
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
								<div class="form-group">
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
								</div>
								<div class="form-group">
									<div class="control-label">
										<label for="" class="control-label"> Accident/Incidents: </label>
									</div>
					                <div class="col-xs-6">
					                    <label for="" class="sr-only">Accident</label>
					                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#accident">Add Accident</button>
										<p class="help-text small">Accident.</p>
					                    <span class="error"><?php echo isset($pod_error) ? $pod_error : false; ?></span>
					                </div>
					                <div class="col-xs-6">
					                    <label for="" class="sr-only">Incident</label>
					                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#incident">Add Incident</button>
										<p class="help-text small">Incident.</p>
					                    <span class="error"><?php echo isset($pod_error) ? $pod_error : false; ?></span>
					                </div>
								</div>
								<div class="form-group">
									<div class="control-label">
										<label for="" class="control-label"> Staff comments: </label>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<label for="" class="sr-only">Coments</label>
											<textarea class="btn-block" type="button" placeholder="coments..." ></textarea>
											<p class="help-text small">Coments.</p>
											<span class="error"><?php echo isset($pod_error) ? $pod_error : false; ?></span>
										</div>
									</div>
								</div>
								
								<input type="submit" name="submit" value="Submit form">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="clo-lg-2 col-sm-12">
				<!--The Ad goes here-->
			</div>
		</div><!--/.row-->
		
		<div class="row">
            
		</div><!--/.row-->
            
		</div><!--/.row-->
								
		<div class="row">
			
		</div><!--/.row-->
	</div>	<!--/.main-->


	<!--/.modal -->
	<div class="modal fade" id="newEmployee" tabindex="-1" role="dialog" aria-labelledby="newEmployee">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Modal title</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="control-label">
									<label for="" class="control-label"> Staff details: </label>
								</div>
								<div class="col-xs-6">
									<label for="" class="sr-only">First name</label>
									<input type="text" name="pod" class="form-control" id="first_name" placeholder="first name" value="">
									<p class="help-text small">Enter first name.</p>
									<span class="error"></span>
								</div>
								<div class="col-xs-6">
									<label for="" class="sr-only">Last name</label>
									<input type="text" name="pod" class="form-control" id="first_name" placeholder="Last name" value="">
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
										<label for="pod" class="sr-only">Staff ID</label>
										<input type="text" name="pod" class="form-control" id="first_name" placeholder="staff ID..." value="">
										<p class="help-text small">Enter staff id.</p>
										<span class="error"></span>
									</div>
									<div class="col-xs-6">
										<label for="pod" class="sr-only">Staff Phone number</label>
										<input type="text" name="pod" class="form-control" id="first_name" placeholder="phone number..." value="">
										<p class="help-text small">Enter your phone number.</p>
										<span class="error"></span>
									</div>
								</div>		
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	<!--/.modal -->
	<div class="modal fade" id="accident" tabindex="-1" role="dialog" aria-labelledby="accident">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Modal title</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="control-label">
									<label for="" class="control-label"> particulars of the injured person: </label>
								</div>
								<div class="col-xs-6">
									<label for="" class="sr-only">Id number of the injured person</label>
									<input type="text" name="pod" class="form-control" id="first_name" placeholder="Id number of the injured person" value="">
									<p class="help-text small">Enter the Id number of the injured person.</p>
									<span class="error"></span>
								</div>
								<div class="col-xs-6">
									<label for="" class="sr-only">Nature of the injury</label>
									<input type="text" name="pod" class="form-control" id="first_name" placeholder="Nature of the injury" value="">
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
										<label for="" class="sr-only">Body part injured</label>
										<input type="text" name="pod" class="form-control" id="first_name" placeholder="Body psrt injured" value="">
										<p class="help-text small">Enter the Body part injured.</p>
										<span class="error"></span>
									</div>
									<div class="col-xs-6">
										<label for="" class="sr-only">Extend of the injury</label>
										<input type="text" name="pod" class="form-control" id="first_name" placeholder="Extend of the injury" value="">
										<p class="help-text small">Enter the Extend of the injury.</p>
										<span class="error"></span>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label for="pod" class="sr-only">Describe the incident</label>
										<textarea type="text" name="pod" class="form-control" id="first_name" placeholder="Describe the incident..." value=""></textarea>
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
										<label for="" class="sr-only">First aid</label>
											First aid offered: <input type="radio" name="firstaid" data-toggle="collapse" href="#yesWho" aria-expanded="false" aria-controls="yesWho">Yes
											<input type="radio" name="firstaid" data-toggle="collapse" href="#noWhy" aria-expanded="false" aria-controls="noWhy">No
											<div class="collapse" id="yesWho">
												<div class="well">
													<input type="text" name="pod" class="form-control" id="first_name" placeholder="if yes name of who offed firstaid..." value="">
												</div>
											</div>
											<div class="collapse" id="noWhy">
												<div class="well">
													<input type="text" name="pod" class="form-control" id="first_name" placeholder="if no why?..." value="">
												</div>
											</div>							
										</div>
										<div class="col-xs-6">
											<label for="" class="sr-only">First aid</label>"
											Was he taken to hospital: <input type="radio" name="firstaid" data-toggle="collapse" href="#yesWhere" aria-expanded="false" aria-controls="yesWhere">Yes
											<input type="radio" name="firstaid" data-toggle="collapse" href="#whyNot" aria-expanded="false" aria-controls="whyNot">No
											<div class="collapse" id="yesWhere">
												<div class="well">
													<input type="text" name="pod" class="form-control" id="first_name" placeholder="if yes where and what time..." value="">
												</div>
											</div>
											<div class="collapse" id="whyNot">
												<div class="well">
													<input type="text" name="pod" class="form-control" id="first_name" placeholder="if no why?..." value="">
												</div>
											</div>				
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<label for="pod" class="sr-only">Staff coments on the incidents.</label>
											<textarea type="text" name="pod" class="form-control" id="first_name" placeholder="Staff coments on the incidents...." value=""></textarea>
											<p class="help-text small">Enter your coments about the incident.</p>
											<span class="error"></span>
										</div>
										<div class="col-xs-6">
											<label for="pod" class="sr-only">Attach dobe sheet.</label>
											<input type="file" name="pod" class="form-control" id="first_name" placeholder="Attach dobe sheet...." value="">
											<p class="help-text small">Attach dobe sheet.</p>
											<span class="error"></span>
										</div>
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	<!--/.modal -->
	<div class="modal fade" id="incident" tabindex="-1" role="dialog" aria-labelledby="incident">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Incident Entry</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="control-label">
									<label for="" class="control-label"> Description of the incident: </label>
								</div>
								<div class="col-xs-6">
									<label for="" class="sr-only">One sentence description of what happened</label>
									<input type="text" name="pod" class="form-control" id="first_name" placeholder="One sentence description of what happened" value="">
									<p class="help-text small">One sentence description of what happened.</p>
									<span class="error"></span>
								</div>
								<div class="col-xs-6">
									<label for="" class="sr-only">Time of incident</label>
									<input type="text" name="pod" class="form-control" id="first_name" placeholder="Time of incident" value="">
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
										<label for="pod" class="sr-only">Describe the incident</label>
										<textarea type="text" name="pod" class="form-control" id="first_name" placeholder="Describe the incident..." value=""></textarea>
										<p class="help-text small">Describe the incident.</p>
										<span class="error"></span>
									</div>
								</div>				
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

<?php include_layout_template('footer.php'); ?>