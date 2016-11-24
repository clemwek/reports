<?php
//require once the needed class
require_once("../../includes/initialize.php");
//check if there is a session, if true redirect to index.php
if ($session->is_logged_in()) {
    $session->user_redirect($session->usertype);
}
?>
<?php
if (isset($_POST['submit'])) {
	if (Token::check($_POST['token'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		//Validation of the form
		if (empty($username)) {
			$username_error = 'User name is empty, Please fill';
		}//check if the username field was filled

		if (empty($password)) {
			$password_error = 'Password is empty, Please fill';
		}//check if the password field was filled
  
		//check database to see if the username/password exists
		$found_user = User::authenticate($username, $password);

		if ($found_user) {
			$session->login($found_user);
			Logins::clog("Success", $found_user->id);
			$session->user_redirect($session->usertype);//using the function to 
			//redirect_to("index.php");
		} else {
		//User/password combo was not found in
			$message = "Username/password combination incorect. Please check and try again";
		}
	}
	
} else {
	$username = "";
	$password = "";
}

?>

<?php include_layout_template('form_header.php'); ?>

	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3>
						<span class=" glyphicon glyphicon-log-in"> Login </span>
				</div><!--End of the header-->
				<div class="panel-body">
					<?php
					if (!empty($message)) {$error_out = "<div class=\"alert alert-danger\" role=\"alert\">";
						$error_out .= "<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>";
						$error_out .= "<span class=\"sr-only\">Error:</span>";
						$error_out .=  output_message($message); 
					$error_out .= "</div>";
					echo $error_out;
					}?><!--End of Error section -->
					<p>Enter your username and password to login: </p>
					<hr/>
					<form role="form" action="" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username..." name="username" type="text" autofocus="" value="<?php echo isset($username) ? $username : false; ?>" required>
								<p class="help-block small">Enter your username.</p>
								<span class="text-danger bg-danger text-center"><?php echo isset($username_error) ? $username_error : false; ?></span>
							</div>
							
							<div class="form-group">
								<input class="form-control" placeholder="Password..." name="password" type="password" value="<?php echo isset($password) ? $password : false; ?>">
								<p class="help-block small">Enter your password.</p>
								<span class="text-danger bg-danger text-center"><?php echo isset($password_error) ? $password_error : false; ?></span>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
							<input type="submit" name="submit" value="submit" class="btn btn-success" >
							<p>If you don't have an account <a class="btn btn-primary" href="register.php">Register</a>.</p>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

<?php include_layout_template('form_footer.php'); ?>                      