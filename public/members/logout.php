<?php
require_once("../../includes/initialize.php");

$session->logout() ? redirect_to("login.php") : redirect_to("login.php");


?>