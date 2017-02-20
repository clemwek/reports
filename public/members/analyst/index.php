<?php
require_once("../../../includes/initialize.php");
//if (!$session->is_logged_in()) { redirect_to("login.php");}
?>
<?php
// Date processing
$date = date_only(time());

// This brings in the user details
//$user = User::find_by_id($session->user_id);

//Find company details
//$employer = Employer::find_by_user_id($user->id);


//Bring in data from accidents, incidents, new employees not submited reports
//Bring the data from json
$data_file = '../../../includes/data.json';
$data_json = file_get_contents($data_file);
$data_array = json_decode($data_json, true);

// Read accident data 
$accident_count = Accident::count_all_on_date($date);

// Read incident data 
$incident_count = Incident::count_all_on_date($date);

// Read new staff data 
$new_staff_count = Site_staff::count_all_on_date($date);


// Read report data from the db
$report = Report::find_for_date($date);
// die(var_dump($report));
// die ('<pre>'.print_r($report[0]).'</pre>');
?>
<?php include_layout_template('header.php'); ?>

	
<!-- Side bar nav-->
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
		<li class="active"><a href="#">
			<i class="glyphicon glyphicon-home visible-xs"></i> 
			<span class="visible-sm visible-md visible-lg"><i class="glyphicon glyphicon-home"></i> Home </span>
		</a></li>
		<li class="active"><a href="#">
			<i class="glyphicon glyphicon-eye-open visible-xs"></i> 
			<span class="visible-sm visible-md visible-lg"><i class="glyphicon glyphicon-eye-open"></i> Sites </span>
		</a>
			<?php if (isset($data_array)): ?>
			<ul>
				<?php foreach ($data_array['sites'] as $data): ?>
				<li>
					<?php echo '<a href="#" class="show_site">'.$data.'</a>'; ?>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</li>
		<!--<li class="active"><a href="available_jobs.php">
			<i class="glyphicon glyphicon-tasks visible-xs"></i> 
			<span class="visible-sm visible-md visible-lg"><i class="glyphicon glyphicon-tasks"></i> Available Jobs </span>
		</a></li>
		<li class="active"><a href="#">
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
							<div class="large"><?php echo $accident_count; ?></div>
							<div class="text-muted">Accident</div>
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
							<div class="large"><?php echo $incident_count; ?></div>
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
							<div class="large"><?php echo $new_staff_count; ?></div>
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
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">All Site</h3>
					</div>
					<div class="panel-body">
						<div class="site_repot">
							<p><stong>Attendance: </stong><span>Present: </span> <?php echo isset($report->present) ? $report->present : 'No entry yet...' ; ?> -- <span>Absent: </span> <?php echo isset($report->absent) ? $report->absent : 'No entry yet...' ; ?>  -- <span>Leave: </span> <?php echo isset($report->leave) ? $report->leave : 'No entry yet...' ; ?> </p><hr>
							<p><stong>Gender: </stong><span>Male: </span> <?php echo 'number Male'; ?> -- <span>Female: </span> <?php echo 'number Female!'; ?> </p><hr>
							<p><stong>New Staff: </stong><span>Male: </span> <?php echo 'number Male'; ?> -- <span>Female: </span> <?php echo 'number Female!'; ?> -- <span>Total: </span> <?php echo 'number Total!'; ?> </p><hr>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
            
		</div><!--/.row-->
            
		</div><!--/.row-->
								
		<div class="row">
			
		</div><!--/.row-->
	</div>	<!--/.main-->
<?php include_layout_template('footer.php'); ?>