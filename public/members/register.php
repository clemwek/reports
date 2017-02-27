<?php
require_once("../../includes/initialize.php");
//check if there is a session, if true redirect to index.php
if ($session->is_logged_in()) {
    $session->user_redirect($session->usertype);
}
?>
<?php
$message = "";
//form has been submited
if (isset($_POST['submit'])) {
	if (Token::check($_POST['token'])) {
		$fname = trim($_POST['first_name']);
		$lname = trim($_POST['last_name']);
		$uname = trim($_POST['username']);
		$pword = trim($_POST['password']);
		$pword_again = trim($_POST['password_again']);
		$pnumber =(INT) trim($_POST['phone_number']);
		$email = trim($_POST['email']);
		$site = trim($_POST['site']);
		$id_number = trim($_POST['id']);
		$type = 'staff';
		
		$error = false;

		if (empty($fname)) {
			$fname_error = 'First name is empty, Please fill';
			$error = true;
		}

		if (empty($lname)) {
			$lname_error = 'Last name is empty, Please fill';
			$error = true;
		}

		if (empty($uname)) {
			$uname_error = 'User name is empty, Please fill';
			$error = true;
		}

		if (empty($pword)) {
			$pword_error = 'Password is empty, Please fill';
			$error = true;
		}
		
		if (empty($pword_again)) {
			$pword_again_error = 'Password again is empty, Please fill';
			$error = true;
		} elseif (!($pword_again === $pword)) {
			$pword_again_error = 'Password and password again does not match, Please check';
			$error = true;
		}

		if (empty($pnumber)) {
			$pnumber_error = 'Phone number is empty, Please fill';
			$error = true;
		} else if (!(strlen((string)$pnumber)==9)) {
			$pnumber_error2 = 'The number provided is not valid, please correct.';
			$error = true;
		}

		if (empty($email)) {
			$email_error = 'Email is empty, Please fill';
			$error = true;
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_error = 'Email is not valid';
			$error = true;
		}

		if (empty($site)) {
			$site_error = 'site is empty, Please fill';
			$error = true;
		}

		if (empty($id_number)) {
			$id_error = 'ID is empty, Please fill';
			$error = true;
		}

		if ($error === false) {
			$new_user = User::make($fname, $lname, $uname, $pword, $pnumber, $id_number, $email, $site, $type);

			$user = new User;
			//confirm there are no previous entries
			if($user->username_exists($uname)) {
				$message = "try another username, this is already taken!";
			} else if ($user->email_exists($email)) {
				$message = "try another email id, this is already taken !";
			} else {
				if ($new_user && $new_user->create()) {  
					$session->login($new_user);
					if ($session->usertype == "employee" || $session->usertype == "Employee" ) {
						redirect_to("personal_details_form.php");
					} elseif ($session->usertype == "employer" || $session->usertype == "Employer" ) {
						redirect_to("employers/profile.php");
					}
					$session->user_redirect($session->usertype);     
				}
			}
		}
		
	}
} else {
	$fname = "";
	$lname = "";
	$uname = "";
	$pword = "";
	$pnumber = "";
	$email = "";
	$site = "";
	$utype = "";
	$phone_number = "";
}
?>

<?php include_layout_template('form_header.php'); ?>

	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3>
						<span class="glyphicon glyphicon-plus-sign"> Register </span>
					</h3>
				</div>
				<div class="panel-body">
					<?php
					if (!empty($message)) {$error_out = "<div class=\"alert alert-danger\" role=\"alert\">";
						$error_out .= "<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>";
						$error_out .= "<span class=\"sr-only\">Error:</span>";
						$error_out .=  output_message($message); 
					$error_out .= "</div>";
					echo $error_out;
					}?><!--End of Error section -->
					<p>Fill this form to register with us:</p>
					<hr/>
					<form action="" role="form" method="post">
						<fieldset>
							<div class="form-group">
								<div class="control-label">
									<label for="" class="control-label">General Infomation: </label>
								</div>
								<div class="col-xs-6">
									<label class="sr-only" for="first_name">First Name: </label>
									<input type="text" name="first_name" class="form-control" id="first_name" placeholder="first name" value="<?php echo isset($fname) ? $fname: false; ?>"  title="Please enter your first name." required>
									<p class="help-text small">Enter your first name.</p>
									<span class="error"><?php echo isset($fname_error) ? $fname_error : false; ?></span>
								</div>
								<div class="col-xs-6">
									<label class="sr-only" for="last_name">Last Name: </label>
									<input type="text" name="last_name" class="form-control" id="last_name" placeholder="last name" value="<?php echo isset($lname) ? $lname : false; ?>" title="Please enter your last name."  required>
									<p class="help-text small">Enter your last name.</p>
									<span class="error"><?php echo isset($lname_error) ? $lname_error : false; ?></span>
								</div>
							</div><!-- End of general information-->
							  
							<div class="form-group">
								<div class="control-label">
									<label for="" class="control-label">Login Infomation: </label>
								</div>
									<div class="col-sm-4">
										<label class="sr-only" for="username">UserName: </label>
										<input type="text" name="username" class="form-control" id="username" placeholder="username..." value="<?php echo isset($uname) ? $uname: false; ?>" title="Please enter your user name."  required>
										<p class="help-text small">Enter your username.</p>
										<span class="error"><?php echo isset($uname_error) ? $uname_error : false; ?></span>
										<span class="error"><?php echo isset($uname_error) ? $uname_error : false; ?></span>
									</div>
									<div class="col-sm-4">
										<label for="password" class="sr-only">Password: </label>
										<input type="password" name="password" class="form-control" id="password" placeholder="Password..." title="Please enter your password."  required>
										<p class="help-text small">Enter your password.</p>
										<span class="error"><?php echo isset($pword_error) ? $pword_error : false; ?></span>
									</div>
									<div class="col-sm-4">
										<label for="password" class="sr-only">Password again: </label>
										<input type="password" name="password_again" class="form-control" id="password_again" placeholder="Password again..." title="Please enter your password again."  required>
										<p class="help-text small">Enter your password again.</p>
										<span class="error"><?php echo isset($pword_again_error) ? $pword_again_error : false; ?></span>
									</div>
								</div><!--End of login information -->
							  
								<div class="form-group">
									<div class="control-label">
										<label for="" class="control-label">Contact Infomation: </label>
									</div>
									<div class="input-group">
										<div class="col-sm-6">
											<div class="input-group">
												<input type="text" name="phone_number" class="form-control" placeholder="phone number..." aria-label="...">
												<p class="help-text small">Choose your country and enter your phone number.</p>
											</div><!-- /input-group -->
											<span class="error"><?php echo isset($pnumber_error) ? $pnumber_error : false; ?></span>
										</div><!-- /.col-lg-6 -->
										<div class="col-sm-6">
											<label class="sr-only" for="email">Email: </label>
											<input type="text" name="email" class="form-control" id="email" placeholder="email..." value="<?php echo isset($email) ? $email : false; ?>" title="Please enter your email."  required>
											<p class="help-text small">Enter your email address.</p>
											<span class="error"><?php echo isset($email_error) ? $email_error : false; ?></span>
										</div>
									</div>
									<div class="input-group">
										<div class="col-xs-6">
											<label class="sr-only" for="id">Id: </label>
											<input type="text" name="id" class="form-control" id="id" placeholder="ID..." value="<?php echo isset($id) ? $id: false; ?>" title="Please enter your id."  required>
											<p class="help-text small">Enter your id you are.</p>
											<span class="error"><?php echo isset($id_error) ? $id_error : false; ?></span>
										</div>
										<div class="col-xs-6">
											<label class="sr-only" for="site">Site: </label>
											<!--<input type="text" name="site" class="form-control" id="site" placeholder="site..." value="<?php //echo isset($site) ? $site: false; ?>" title="Please enter your site."  required>-->
											<?php
											$sites = load_json('../../includes/data.json');
											$output = '<select name="site" class="form-control" id="site" placeholder="site..." title="Please enter your site."  required>';
											foreach ($sites['sites'] as $site) {
												$output .="<option>{$site}</option>";
											}
											$output .= '</select>';			
											print $output;
											?>
											<p class="help-text small">Enter the region you are.</p>
											<span class="error"><?php echo isset($site_error) ? $site_error : false; ?></span>
										</div>
									</div>
								</div><!-- End of contact infprmation-->
								
								<div class="form-group">
									<div class="col-sm-6">
										<br/>
										<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
										<input type="submit" name="submit" class="btn btn-success" value="Register">
									</div>
									<div class="col-sm-6">
										<br/>
										<p>If you already have an account <a class="btn btn-primary" href="login.php"> Login </a>.</p>
									</div>
								</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.MAIN row -->	


<?php include_layout_template('form_footer.php'); ?>    
