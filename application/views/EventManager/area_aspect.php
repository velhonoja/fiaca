<!--

Events for specific area

-->

<h1><?php echo $area['area_code'] ?></h1>
<h3><?php echo $area['area_location'] ?></h3>


	<?php echo form_open('eventManager'); ?>
	
	[TODO: form which allows to choose event type, user and start/end-dates for new event (linked to this area)]
	
	
	<?php echo form_submit('area_aspect_event_submit', 'Add new event'); ?>
	
	<?php echo form_close(); ?>


<h3>Recent event for this area</h3>

<?php

foreach ($events as $event): 
	$this->load->view("EventManager/event",array( "event" => $event ));
endforeach;


?>
