<?php

function has_presence($value) {
	return isset($value) && $value !== '';
}

function has_max_lenth($value, $max) {
	return strlen($value)<= $max;
}

function form_errors($errors=arroy()) {
	$output = '';
	if (!empty($errors)) {
		$output .= ''
	}
}


?>