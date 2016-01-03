<!--

Events for specific area

-->

<h1><?php echo $area['area_code'] ?></h1>
<h3><?php echo $area['area_location'] ?></h3>

 
	<?php echo validation_errors(); ?>
	
	<?php echo form_open('EventManager/area_aspect/' . $area['area_id']); ?>
	
	
	<div class="todo">
	TODO: actually save new event
	</div>
	<div class="todo">
	TODO: check if this area is currently being "borrowed" and if so
	show simple "is returned now" button or something to easily end borrowing?
	</div>
	 
	 
	<br /> 
	  
	<?php
	
		echo form_hidden( 'area_id', $area['area_id'] );
		
		echo fiaca_user_dropdown(
			$users,
			$this->input->post('user_id', TRUE)
		);
	
		echo fiaca_radio_button_group_select_event_type(
			$event_types,
			$this->input->post('event_type_id', TRUE)
		); 
		 
		echo fiaca_datechooser(
			'Startdate',
			'event_start_date',
			$this->input->post('event_start_date', TRUE)
		);
		
		echo fiaca_datechooser(
			'Enddate',
			'event_end_date',
			$this->input->post('event_end_date', TRUE)
		);
		
	?> 
	
	<br />
	
	
	
	
	
	
	
	
	
	<?php echo form_submit('area_aspect_event_submit', 'Add new event'); ?>
	
	<?php echo form_close(); ?>


<h3>Recent event for this area</h3>

<?php

foreach ($events as $event): 
	$this->load->view("EventManager/event",array( "event" => $event ));
endforeach;


?>
