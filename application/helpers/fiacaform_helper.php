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
 
 
/*
Helper function for making "select event type" radio button group
*/
function fiaca_radio_button_group_select_event_type($event_types, $default_value){
	//$value = $this->input->post('event_type_id', TRUE);
	
	$html = "<div class='fiaca-form-input-container fiaca-form-event-types-radiogroup'>";
		 
		foreach ($event_types as $e):
			$html .= '<div class="fiaca-form-event-types-radiogroup-item">';
			$html .= "<label>". $e['event_type_name'] ."</label>";
			$html .= form_radio( 'event_type_id', $e['event_type_id'], $default_value == $e['event_type_id'] );
			$html .= "</div>";
		endforeach;
		
	$html .= "</div>";
	return $html;
}
  
/*
Helper function for making "select user" dropdown input
*/
function fiaca_user_dropdown( $users, $default_value ){
	$html = "<div class='fiaca-form-input-container fiaca-form-users fiaca-form-users-dropdown'>";
	$html .= '<select name="user_id">';
		 
		foreach ($users as $user):
			$html .= '<option value="' . $user->user_id . '"';
			if( $default_value == $user->user_id ){
				$html .= 'selected';
			}
			$html .= '>';
			$html .= $user->user_firstname . " " . $user->user_lastname;
			$html .= '</option>';
		endforeach;
		
	$html .= "</select>";
	$html .= "</div>";
	return $html;
}


   
/*
Helper function for making "select date" input
*/
function fiaca_datechooser( $label, $varname, $default_value ){
	$html = "<div class='fiaca-form-input-container'>";
		$html .= '<p>'.$label.': <input name="'.$varname.'" type="text" class="fiaca-datepicker" value="'.$default_value.'" /></p>';
	$html .= "</div>";
	return $html;
}



