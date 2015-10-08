<!--
List latest events.
-->



<h3>Recent events</h3>



<?php 
foreach ($events as $event): 
	$this->load->view("EventManager/event",array( "event" => $event ));
endforeach;


?>

 
