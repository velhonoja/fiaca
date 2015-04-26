<?php 


// list all event types 


// $this->load->view("EventTypeManager/event_type");
?>

<h2>Event Types</h2>

<?php foreach ($event_types as $event_type): 
	$this->load->view("EventTypeManager/form",array( "event_type" => $event_type ));
endforeach ?>


