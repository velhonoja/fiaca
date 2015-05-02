<?php
/*

Helper functions for creating forms 

*/

/*
Helper function for making input-element
*/
function fiaca_input($event_type, $name){
	$html = "<div class='fiaca-form-input-container'>";
		$html .= $name;
		$html .= "<br />";
		$html .= form_input($name, $event_type[$name]);
	$html .= "</div>";
	return $html;
}

/*
Helper function for making checkbox
*/
function fiaca_checkbox($event_type, $name){
	$html = "<div class='fiaca-form-input-container'>";
		$html .= form_checkbox($name, "boolean_value", $event_type[$name]);
		$html .= $name;
	$html .= "</div>";
	return $html;
}



