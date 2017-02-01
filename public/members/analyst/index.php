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

	
	<!-- Side bar nav-->
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
		<li class="active"><a href="#">
			<i class="glyphicon glyphicon-home visible-xs"></i> 
			<span class="visible-sm visible-md visible-lg"><i class="glyphicon glyphicon-home"></i> Home </span>
		</a></li>
		<li class="active"><a href="applied_jobs.php">
			<i class="glyphicon glyphicon-eye-open visible-xs"></i> 
			<span class="visible-sm visible-md visible-lg"><i class="glyphicon glyphicon-eye-open"></i> Sites </span>
		</a></li>
		<li class="active"><a href="available_jobs.php">
			<i class="glyphicon glyphicon-tasks visible-xs"></i> 
			<span class="visible-sm visible-md visible-lg"><i class="glyphicon glyphicon-tasks"></i> Available Jobs </span>
		</a></li>
		<!--<li class="active"><a href="#">
			<i class="glyphicon glyphicon-user visible-xs"></i> 
			<span class="visible-sm visible-md visible-lg"><i class="glyphicon glyphicon-user"></i> Profile </span>
		</a></li>-->
	</ul>
</div><!-- End of side nav-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"class="glyphicon glyphicon-home"></a></li>
				<li class="active">Profile (<?php //echo $user->full_name(); ?>)</li>
			</ol>
		</div><!--/.row -Bread crumbs-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Insight Report Analysis</h1>
			</div>
		</div><!--/.row -Page header-->

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="glyphicon glyphicon-import"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">Injuries</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="glyphicon glyphicon-ice-lolly-tasted"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Incidents</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="glyphicon glyphicon-bishop"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">24</div>
							<div class="text-muted">New Employees</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="glyphicon glyphicon-sound-dolby"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">Not submited report</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-xs-6">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Label:</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-6">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Label:</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			
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