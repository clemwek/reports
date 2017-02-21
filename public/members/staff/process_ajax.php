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
        
    case 'accident':
        //get variables
        $staff_id = $_POST['id_of_injured'];
        $nature_of_injury = $_POST['nature_of_injured'];
        $body_part_injury = $_POST['body_part_injured'];
        $extent_of_injury = $_POST['ext_of_injury'];
        $description = $_POST['incident_desc'];
        $first_aid = $_POST['first_aid'];
        $first_aid_explain = $_POST['firstaid_desc'];
        $hospital = $_POST['hospital'];
        $hospital_explain = $_POST['hospital_desc'];
        $coment = $_POST['accident_coments'];
        $date = datetime(time());
        $error = false;
        $error_array = [];
        $site_name = 'test';

        //validations
        

        //proccess/ save to the db
        if ($error === false) {
            $dosh_id = 1; 
            $accident = Accident::make ($date, $staff_id, $site_name, $dosh_id, $nature_of_injury, $body_part_injury, $extent_of_injury, $description, $first_aid, $hospital, $first_aid_explain, $hospital_explain, $coment);

            if ($accident && $accident->create()) {
                echo '<div class="alert alert-success" role="alert">Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                echo 'There was an error while saving the database!!!';
            }
        }
    break;

    case 'incident':
        //get variables
        $what = $_POST['short_incident_desc'];
        $time = $_POST['incident_time'];
        $description = $_POST['incident_desc'];
        $date = datetime(time());
        $error = false;
        $error_array = [];
        $site_name = 'test';

        //validations

        //proccess/ save to the db
        if ($error == false) {
            $incident = Incident::make ($date, $site_name, $what, $description, $time);

            if ($incident && $incident->create()) {
                echo '<div class="alert alert-success" role="alert">Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                echo 'There was an error while saving the database!!!';
            }
        }
    break;

    case 'cat':
        //get variables
        $name = $_POST['emp_cat'];
        $number = $_POST['no_emp_cat'];
        $date = datetime(time());
        $error = false;
        $error_array = [];
        $site_name = 'test';

        //validations

        //proccess/ save to the db
        if ($error == false) {
            $cat = Cat::make ($date, $site_name, $name, $number);

            if ($cat && $cat->create()) {
                echo '<div class="alert alert-success" role="alert">Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                echo 'There was an error while saving the database!!!';
            }
        }
    break;

    case 'payment':
        //get variables
        $type = $_POST['payment_name'];
        $amount = $_POST['amount_payment'];
        $nhif = $_POST['nhif_payment'];
        $nssf = $_POST['nssf_payment'];
        $other = $_POST['other_payment'];
        $other_exp = $_POST['other_exp'];
        $date = datetime(time());
        $error = false;
        $error_array = [];
        $site_name = 'test';

        //validations

        //proccess/ save to the db
        if ($error == false) {
            $payment = Payment::make ($date, $site_name, $type, $amount, $nhif, $nssf, $other, $other_exp);

            if ($payment && $payment->create()) {
                echo '<div class="alert alert-success" role="alert">Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                echo 'There was an error while saving the database!!!';
            }
        }
    break;

    case 'report':
        //get the variable setup
        $present = $_POST['no_of_present'];
        $absent = $_POST['no_of_absent'];
        $leave_no = $_POST['no_of_leave'];
        $male = $_POST['no_of_male'];
        $female = $_POST['no_of_female'];
        $new = $_POST['no_of_new'];
        $report_coment = $_POST['report_coment'];
        $date = date_only(time());
        $error = false;
        $error_array = [];
        $site_name = 'test';
        $IMC_staff_id = $session->user_id;
        // make sure there is no entry for before
        $entry = Report::find_for_date($date, $IMC_staff_id);
        // isset($entry) ? $id = $entry['id'] : $id =(INT) 0;

        $report = Report::make ($id=0, $date, $present, $absent, $leave_no, $female, $male, $new, $site_name, $IMC_staff_id) ;

        // var_dump($entry);
        if ($entry) {
            echo '<div class="alert alert-danger" role="alert">You have already made entry <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            // if ($report && $report->save()) {
            //     echo '<div class="alert alert-success" role="alert">Update was a success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            // } else {
            //     echo 'There was an error while updating the database!!!';
            // }
        } else {
            if ($report && $report->save()) {
                echo '<div class="alert alert-success" role="alert">Data was success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                var_dumb($entry);
                echo 'There was an error while saving the database!!!';
            }
        }

        
        

    break;
}
?>