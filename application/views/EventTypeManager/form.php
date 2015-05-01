<!--

Form to view/edit event_type

Using panel from bootstrap.

howto use:
http://getbootstrap.com/components/#panels

-->



<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $event_type['event_type_name'] ?></h3>
  </div>
  <div class="panel-body">
  
    
	<?php echo form_open('eventTypeManager'); ?>
	
	<?php echo form_hidden('event_type_id',  $event_type['event_type_id'] ); ?>
  
	<?php echo createSimpleInput($event_type, "event_type_name"); ?>
	
	
	<?php echo createSimpleCheckbox($event_type, "event_type_hasduration"); ?>
	<?php echo createSimpleCheckbox($event_type, "event_type_tostats"); ?>
	<?php echo createSimpleCheckbox($event_type, "event_type_effects_borrowing"); ?>
  
	<?php echo form_submit('event_type_submit', 'Save'); ?>
	
	<?php echo form_close(); ?>
	
  </div> <!-- panel-body end -->
</div>
