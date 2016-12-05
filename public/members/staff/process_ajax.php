<?php
require_once('../../../includes/initialize.php');

function getMode () {
    if (isset ($_POST)) {
        return $_POST['mode'];
    } else {
        return $_GET['mode'];
    }
}



switch (getMode ()) {
    case 'new_staff':
        //get variables
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $id_number = $_POST['national_id'];
        $phone_number = $_POST['staff_phone_number'];
        $date = datetime(time());
        $error = false;
        $error_array = [];

        //validations
        if (empty ($firstName)) {
            $error_array['first_name'] = 'Please fill the first name field.';
             $error = true;
        }
        if (empty ($lastName)) {
            $error_array['last_name'] = 'Please fill the last name field.';
             $error = true;
        }
        if (empty ($id_number)) {
            $error_array['national_id'] = 'Please fill the national id field.';
             $error = true;
        }
        if (empty ($phone_number)) {
            $error_array['staff_phone_number'] = 'Please fill the phone number field.';
             $error = true;
        }

        //proccess/ save to the db
        if ($error === false) {
            $new_staff = Site_staff::make ($date, $firstName, $lastName, $id_number, $phone_number);

            if ($new_staff && $new_staff->create()) {
                echo '<div class="alert alert-success" role="alert">Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                echo 'There was an error while saving the database!!!';
            }
        }
    break;
}
?>