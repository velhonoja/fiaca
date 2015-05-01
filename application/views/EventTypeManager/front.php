<?php 


// TODO: figure out where I should put these helper functions?


/*
Ugly helper function for making input-element

*/
function createSimpleInput($event_type, $name){
	$html = "<div class='fiaca-form-input-container'>";
	$html .= $name."<br />";
	$html .= form_input($name, $event_type[$name]);
	$html .= "</div>";
	return $html;
}

/*
Ugly helper function for making checkbox
*/
function createSimpleCheckbox($event_type, $name){
	$html = "<div class='fiaca-form-input-container'>";
	$html .= form_checkbox($name, "boolean_value", $event_type[$name]);
	$html .= $name;
	$html .= "</div>";
	return $html;
}


?>

<h2>Event Types</h2>

<?php foreach ($event_types as $event_type): 
	$this->load->view("EventTypeManager/form",array( "event_type" => $event_type ));
endforeach ?>

<div class="jumbotron">
TODO: add create new / delete
</div>
