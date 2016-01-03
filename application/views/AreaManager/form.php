<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo $area['area_code'] ?></h3>

  </div>
  <div class="panel-body">
  
      <?php 
	if( array_key_exists('area_id', $area) ){
		echo anchor("EventManager/area_aspect/" . $area['area_id'], "Edit events for this area ");
		echo "<div class='todo'>(TODO: better gui/navigation for this?, maybe hide area management and make simpler gui for choosing area?)</div>";
    	}
    ?>
    
	<?php echo form_open('areaManager'); ?>
	
	<?php 
	if( array_key_exists('area_id', $area) ){
		echo form_hidden('area_id',  $area['area_id'] ); 
	}
	?>
  

	
	<?php echo fiaca_input($area, "area_code"); ?>
	<?php echo fiaca_input($area, "area_location"); ?>
	
	
	<?php echo fiaca_checkbox($area, "area_tostats"); ?>
	<?php echo fiaca_input($area, "area_group"); ?>
  
	<?php echo form_submit('area_submit', 'Save'); ?>
	
	<?php echo form_close(); ?>
	
  </div> <!-- panel-body end -->
</div>
