<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $area['area_code'] ?></h3>
  </div>
  <div class="panel-body">
  
    
	<?php echo form_open('areaManager'); ?>
	
	<?php echo form_hidden('area_id',  $event_type['area_id'] ); ?>
  
	
	
	<?php echo fiaca_input($event_type, "event_type_name"); ?>
	
	
	<?php echo fiaca_checkbox($event_type, "event_type_hasduration"); ?>
	<?php echo fiaca_checkbox($event_type, "event_type_tostats"); ?>
	<?php echo fiaca_checkbox($event_type, "event_type_effects_borrowing"); ?>
  
	<?php echo form_submit('event_type_submit', 'Save'); ?>
	
	<?php echo form_close(); ?>
	
  </div> <!-- panel-body end -->
</div>
