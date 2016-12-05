<?php

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) {
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function __autoload($class_name) {
	$class_name = strtolower($class_name);
	$path = LIB_PATH.DS."includes".DS.$class_name.".php";
	if (file_exists($path)) {
		require_once($path);
	} else {
		die ("The file {$class_name}.php could not be found.");
	}
}

function include_layout_template($template="") {
  include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
}

function datetime($dt) {
  return $mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
}
function remaining_time($end_date) {
  $dt = time();

  return  strftime('%H', ($end_date - $dt));
}

function list_industries_fields () {
  $output = "<select name=\"field\" class=\"form-control\" id=\"field\" required>";
        $output .= "<option value=\"\">Choose field</option>";
        $output .= "<option value=\"Accounting\">Accounting</option>";
        $output .= "<option value=\"Audit\">Audit</option>";
        $output .= "<option value=\"Agriculture\">Agriculture</option>";
        $output .= "<option value=\"Administration\">Administration</option>";
        $output .= "<option value=\"Airline\">Airline</option>";
        $output .= "<option value=\"Banking\">Banking</option>";
        $output .= "<option value=\"Communication\">Communication</option>";
        $output .= "<option value=\"Credit Control\">Credit Control</option>";
        $output .= "<option value=\"Customer Service\">Customer Service</option>";
        $output .= "<option value=\"County Govt\">County Govt</option>";
        $output .= "<option value=\"Driver\">Driver</option>";
        $output .= "<option value=\"Engineering\">Engineering</option>";
        $output .= "<option value=\"Graduate Trainee\">Graduate Trainee</option>";
        $output .= "<option value=\"Graphics Designer\">Graphics Designer</option>";
        $output .= "<option value=\"HR Jobs\">HR Jobs</option>";
        $output .= "<option value=\"Hotel Jobs\">Hotel Jobs</option>";
        $output .= "<option value=\"Internships\">Internships</option>";
        $output .= "<option value=\"IT Jobs\">IT Jobs</option>";
        $output .= "<option value=\"Insurance\">Insurance</option>";
        $output .= "<option value=\"Logistics\">Logistics</option>";
        $output .= "<option value=\"Management Trainee\">Management Trainee</option>";
        $output .= "<option value=\"Medical\">Medical</option>";
        $output .= "<option value=\"NGO Jobs\">NGO Jobs</option>";
        $output .= "<option value=\"Nursing\">Nursing</option>";
        $output .= "<option value=\"Nutrition\">Nutrition</option>";
        $output .= "<option value=\"Other Jobs\">Other Jobs</option>";
        $output .= "<option value=\"PR Jobs\">PR Jobs</option>";
        $output .= "<option value=\"Procurement\">Procurement</option>";
        $output .= "<option value=\"Scholarships Kenya\">Scholarships Kenya</option>";
        $output .= "<option value=\"Sales & Marketing\">Sales & Marketing</option>";
        $output .= "<option value=\"Media Jobs\">Media Jobs</option>";
        $output .= "<option value=\"Quality Assuarance\">Quality Assuarance</option>";
        $output .= "<option value=\"Security\">Security</option>";
        $output .= "<option value=\"Social Work\">Social Work</option>";
        $output .= "<option value=\"Teaching\">Teaching</option>";
        $output .= "<option value=\"Tours & Travel\">Tours & Travel</option>";
        $output .= "<option value=\"University\">University</option>";
        $output .= "<option value=\"UN Jobs\">UN Jobs</option>";
        $output .= "<option value=\"Warehouse & Stores\">Warehouse & Stores</option>";
      $output .= "</select>";

      return $output;
}

function list_industries_fields_non_required () {
  $output = "<select name=\"field\" class=\"form-control\" id=\"field\">";
        $output .= "<option value=\"\">Choose field</option>";
        $output .= "<option value=\"Accounting\">Accounting</option>";
        $output .= "<option value=\"Audit\">Audit</option>";
        $output .= "<option value=\"Agriculture\">Agriculture</option>";
        $output .= "<option value=\"Administration\">Administration</option>";
        $output .= "<option value=\"Airline\">Airline</option>";
        $output .= "<option value=\"Banking\">Banking</option>";
        $output .= "<option value=\"Communication\">Communication</option>";
        $output .= "<option value=\"Credit Control\">Credit Control</option>";
        $output .= "<option value=\"Customer Service\">Customer Service</option>";
        $output .= "<option value=\"County Govt\">County Govt</option>";
        $output .= "<option value=\"Driver\">Driver</option>";
        $output .= "<option value=\"Engineering\">Engineering</option>";
        $output .= "<option value=\"Graduate Trainee\">Graduate Trainee</option>";
        $output .= "<option value=\"Graphics Designer\">Graphics Designer</option>";
        $output .= "<option value=\"HR Jobs\">HR Jobs</option>";
        $output .= "<option value=\"Hotel Jobs\">Hotel Jobs</option>";
        $output .= "<option value=\"Internships\">Internships</option>";
        $output .= "<option value=\"IT Jobs\">IT Jobs</option>";
        $output .= "<option value=\"Insurance\">Insurance</option>";
        $output .= "<option value=\"Logistics\">Logistics</option>";
        $output .= "<option value=\"Management Trainee\">Management Trainee</option>";
        $output .= "<option value=\"Medical\">Medical</option>";
        $output .= "<option value=\"NGO Jobs\">NGO Jobs</option>";
        $output .= "<option value=\"Nursing\">Nursing</option>";
        $output .= "<option value=\"Nutrition\">Nutrition</option>";
        $output .= "<option value=\"Other Jobs\">Other Jobs</option>";
        $output .= "<option value=\"PR Jobs\">PR Jobs</option>";
        $output .= "<option value=\"Procurement\">Procurement</option>";
        $output .= "<option value=\"Scholarships Kenya\">Scholarships Kenya</option>";
        $output .= "<option value=\"Sales & Marketing\">Sales & Marketing</option>";
        $output .= "<option value=\"Media Jobs\">Media Jobs</option>";
        $output .= "<option value=\"Quality Assuarance\">Quality Assuarance</option>";
        $output .= "<option value=\"Security\">Security</option>";
        $output .= "<option value=\"Social Work\">Social Work</option>";
        $output .= "<option value=\"Teaching\">Teaching</option>";
        $output .= "<option value=\"Tours & Travel\">Tours & Travel</option>";
        $output .= "<option value=\"University\">University</option>";
        $output .= "<option value=\"UN Jobs\">UN Jobs</option>";
        $output .= "<option value=\"Warehouse & Stores\">Warehouse & Stores</option>";
      $output .= "</select>";

      return $output;
}

function months_of_year($field) {
  $output = "<select name=\"".$field."\" id=\"".$field."\" required>";
    $output .= "<option value=\"\">Month</option>";
    $output .= "<option value=\"1\">January</option>";
    $output .= "<option value=\"2\">February</option>";
    $output .= "<option value=\"3\">March</option>";
    $output .= "<option value=\"4\">April</option>";
    $output .= "<option value=\"5\">May</option>";
    $output .= "<option value=\"6\">June</option>";
    $output .= "<option value=\"7\">July</option>";
    $output .= "<option value=\"8\">August</option>";
    $output .= "<option value=\"9\">September</option>";
    $output .= "<option value=\"10\">October</option>";
    $output .= "<option value=\"11\">November</option>";
    $output .= "<option value=\"12\">December</option>";
   $output .= "</select>";

   return $output;

}

function days_of_the_month($field) {
  $output = "<select name=\"".$field."\" id=\"".$field."\" required>";
      $output .= "<option value=\"\">Day</option>";
      $output .= "<option value=\"1\">1</option>";
      $output .= "<option value=\"2\">2</option>";
      $output .= "<option value=\"3\">3</option>";
      $output .= "<option value=\"4\">4</option>";
      $output .= "<option value=\"5\">5</option>";
      $output .= "<option value=\"6\">6</option>";
      $output .= "<option value=\"7\">7</option>";
      $output .= "<option value=\"8\">8</option>";
      $output .= "<option value=\"9\">9</option>";
      $output .= "<option value=\"10\">10</option>";
      $output .= "<option value=\"11\">11</option>";
      $output .= "<option value=\"12\">12</option>";
      $output .= "<option value=\"13\">14</option>";
      $output .= "<option value=\"15\">15</option>";
      $output .= "<option value=\"16\">16</option>";
      $output .= "<option value=\"17\">17</option>";
      $output .= "<option value=\"18\">18</option>";
      $output .= "<option value=\"19\">19</option>";
      $output .= "<option value=\"20\">20</option>";
      $output .= "<option value=\"21\">21</option>";
      $output .= "<option value=\"22\">22</option>";
      $output .= "<option value=\"23\">23</option>";
      $output .= "<option value=\"24\">24</option>";
      $output .= "<option value=\"25\">25</option>";
      $output .= "<option value=\"26\">26</option>";
      $output .= "<option value=\"27\">27</option>";
      $output .= "<option value=\"28\">28</option>";
      $output .= "<option value=\"29\">29</option>";
      $output .= "<option value=\"30\">30</option>";
      $output .= "<option value=\"31\">31</option>";
    $output .= "</select>";


   return $output;
}
function employment_type ($field) {
  $output = "<select name=\"".$field."\" id=\"".$field."\" required>";
      $output .= "<option value=\"\">Empolyment type</option>";
      $output .= "<option value=\"Permanent\">Permanent</option>";
      $output .= "<option value=\"Contract\">Contract</option>";
      $output .= "<option value=\"Project\">Project</option>";
      $output .= "<option value=\"Internship\">Internship</option>";
    $output .= "</select>";
		
   return $output;
}

function years($field) {
  $output = "<select name=\"".$field."\" id=\"".$field."\" required >";

    $start_yr = 1970;

    for ($count=1; $count<30; $count++) {
      $output .= "<option>".$start_yr."</option>";
      $start_yr++;
    }

  $output .= "</select>";

  return $output;
}

function years_long($field) {
  $output = "<select name=\"".$field."\" id=\"".$field."\" required >";

    $start_yr = 1970;

    for ($count=1; $count<60; $count++) {
      $output .= "<option>".$start_yr."</option>";
      $start_yr++;
    }

  $output .= "</select>";

  return $output;
}

function experience_yrs () {
  $output = "<select name=\"work_exp\" id=\"work_exp\" class=\"form-control\" required>";

    $output .= "<option value=\"\">Number Of Years working</option>";
    $output .= "<option>Less than 1yr</option>";

    for ($count=1; $count<15; $count++) {
      $output .= "<option>".$count."</option>";
    }

    $output .= "<option>More than 15yrs</option>";

  $output .= "</select>";

  return $output;

}

function nationality () {
  $output = "<select name=\"nationality\" id=\"nationality\" class=\"form-control\" required>";

    $output .= "<option value=\"\">Nationality</option>";
    $output .= "<option value=\"Kenyan\">Kenyan</option>";
    $output .= "<option value=\"Tanzanian\">Tanzanian</option>";
    $output .= "<option value=\"Ugandan\">Ugandan</option>";
    // $output .= "<option value=\"\">4</option>";
    // $output .= "<option value=\"5\">5</option>";
    // $output .= "<option value=\"6\">6</option>";
    // $output .= "<option value=\"7\">7</option>";

  $output .= "</select>";

  return $output;

}


?>
