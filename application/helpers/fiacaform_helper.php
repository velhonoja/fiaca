<?php
/*

Helper functions for creating forms 

*/

/*
Helper function for making input-element
*/
function fiaca_input($data_array, $name){
	$html = "<div class='fiaca-form-input-container'>";
		$html .= $name;
		$html .= "<br />";
		$html .= form_input($name, $data_array[$name]);
	$html .= "</div>";
	return $html;
}

/*
Helper function for making checkbox
*/
function fiaca_checkbox($data_array, $name){
	$html = "<div class='fiaca-form-input-container'>";
		$html .= form_checkbox($name, "boolean_value", $data_array[$name]);
		$html .= $name;
	$html .= "</div>";
	return $html;
}



