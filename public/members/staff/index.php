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
						<div id="reportStatus" ></div>
						<form action="" id="reportForm" enctype="multipart/form-data" method="post">
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
					                    <button type="button" class="btn btn-primary btn-block" id="bNewStaff" data-toggle="modal" data-target="#newEmployee">Add new staff</button>
										<p class="help-text small">Number Of new employees.</p>
					                    <span class="error"></span>
					                </div>
								</div>
								<div class="form-group">
									 <div class="col-xs-6">
									 	<button id="bAddCat" class="btn btn-primary btn-block" data-toggle="modal" data-target="#cat">Add cat</button>
									 </div>
								</div>
								<div class="form-group">
									<div class="col-xs-6">
									 	<button id="bAddPayment" class="btn btn-primary btn-block" data-toggle="modal" data-target="#payment">Add payment</button>
									 </div>
								</div>
								<div class="form-group">
									<div class="control-label">
										<label for="" class="control-label"> Accident/Incidents: </label>
									</div>
					                <div class="col-xs-6">
					                    <label for="" class="sr-only">Accident</label>
					                    <button type="button" id="bAccident" class="btn btn-primary btn-block" data-toggle="modal" data-target="#accident">Add Accident</button>
										<p class="help-text small">Accident.</p>
					                    <span class="error"><?php echo isset($pod_error) ? $pod_error : false; ?></span>
					                </div>
					                <div class="col-xs-6">
					                    <label for="" class="sr-only">Incident</label>
					                    <button type="button" id="bIncident" class="btn btn-primary btn-block" data-toggle="modal" data-target="#incident">Add Incident</button>
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
											<textarea name="report_coment" class="btn-block" type="button" placeholder="coments..." ></textarea>
											<p class="help-text small">Coments.</p>
											<span class="error"><?php echo isset($pod_error) ? $pod_error : false; ?></span>
										</div>
									</div>
								</div>
								
								<input type="submit" class="btn btn-success" name="submit" value="Save report">
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
				<form action="" id="newStaffForm" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">New Staff</h4>
						</div>
						<div class="modal-body">
							<div id="newStaffStatus"></div>
							<div id="newStaff"></div>
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
				<form action="" id="accidentForm" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Accident</h4>
						</div>
						<div class="modal-body">
							<div id="accidentStatus"></div>
							<div id="accidentAjax"></div>
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
				<form action="" id="incidentForm" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Incident Entry</h4>
						</div>
						<div class="modal-body">
							<div id="incidentStatus"></div>
							<div id="incidentAjax"></div>
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
	<div class="modal fade" id="cat" tabindex="-1" role="dialog" aria-labelledby="cat">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" id="catForm" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Incident Entry</h4>
						</div>
						<div class="modal-body">
							<div id="catStatus"></div>
							<div id="catAjax"></div>
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
	<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="payment">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="" id="paymentForm" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Incident Entry</h4>
						</div>
						<div class="modal-body">
							<div id="paymentStatus"></div>
							<div id="paymentAjax"></div>
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