<?php 





?>

<h2>Event Types</h2>

<?php $this->load->view("form_validation_errors"); ?>

<?php foreach ($event_types as $event_type): 
	$this->load->view("EventTypeManager/form",array( "event_type" => $event_type ));
endforeach ?>

<h2>Create new event type</h2>
<?php
// one more form for creating "new" 
$new_default_data =  array(
		'event_type_name' => "",
		'event_type_hasduration' => "0",
		'event_type_tostats' => "0",
		'event_type_effects_borrowing' => "0"
	);

$this->load->view("EventTypeManager/form", array( "event_type" =>	$new_default_data ));


