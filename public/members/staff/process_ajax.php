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
        $nhif_number = $_POST['nhif_number'];
        $kra_number = $_POST['kra_number'];
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
        } elseif (strlen($id_number)>11 ) {
            $error_array['national_id'] = 'Please make sure you have entered the exact number of digits in the ID.';
             $error = true;
        }
        if (empty ($phone_number)) {
            $error_array['staff_phone_number'] = 'Please fill the phone number field.';
             $error = true;
        }
        
        $site_name = $session->site_name;

        //proccess/ save to the db
        if ($error === false) {
            $new_staff = Site_staff::make ($id =(INT) 0, $date,$site_name, $firstName, $lastName, $id_number, $phone_number, $nhif_number, $kra_number);

            if ($new_staff && $new_staff->save()) {
                echo '<div class="alert alert-success" role="alert">Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">There was an error while saving the database!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Error with the in put data!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
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
        $site_name = $session->site_name;

        //validations
        

        //proccess/ save to the db
        if ($error === false) {
            $dosh_id = 1; 
            $accident = Accident::make ($id =(INT) 0, $date, $staff_id, $site_name, $dosh_id, $nature_of_injury, $body_part_injury, $extent_of_injury, $description, $first_aid, $hospital, $first_aid_explain, $hospital_explain, $coment);

            if ($accident && $accident->save()) {
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
        $site_name = $session->site_name;

        //validations

        //proccess/ save to the db
        if ($error == false) {
            $incident = Incident::make ($id =(INT) 0, $date, $site_name, $what, $description, $time);

            if ($incident && $incident->save()) {
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
        $site_name = $session->site_name;

        //validations

        //proccess/ save to the db
        if ($error == false) {
            $cat = Cat::make ($id =(INT) 0, $date, $site_name, $name, $number);

            if ($cat && $cat->save()) {
                echo '<div class="alert alert-success" role="alert">Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                echo 'There was an error while saving the database!!!';
            }
        }
    break;

    case 'payment':
        //get variables
        $department = $_POST['department_name'];
        $invoiced_amount = $_POST['invoice_amount'];
        $basic_salary = $_POST['basic_salary'];
        $house_allawance = $_POST['house_allowence'];
        $advance = $_POST['advence'];
        $OT1hours = $_POST['ot1'];
        $OT1amount = $_POST['ot1_amount'];
        $OT2hours = $_POST['ot2'];
        $OT2amount = $_POST['ot2_amount'];
        $absent_days = $_POST['days_absent'];
        $number_of_staff = $_POST['number_of_staff'];
        $date = datetime(time());
        $error = false;
        $error_array = [];
        $site_name = $session->site_name;

        //validations

        //proccess/ save to the db
        if ($error == false) {
            $payment = Payment_site::make ($id=(INT) 0, $date, $site_name, $department, $invoiced_amount, $basic_salary, $house_allawance, $advance, $OT1hours, $OT1amount, $OT2hours, $OT2amount, $absent_days, $number_of_staff);

            if ($payment && $payment->save()) {
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
        $site_name = $session->site_name;
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
                echo '<div class="alert alert-success" role="alert">Data save was success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            } else {
                echo 'There was an error while saving the database!!!';
            }
        }

        
        

    break;
}
?>