

<div class="fiaca_event_block">

<b>Event:</b>

<?php 

/*
TODO:
- make dates prettier/localised?
*/


echo '<span class="fiaca_event_type_name">' . $event['event_type_name'] . '</span>, ';
echo '<span class="fiaca_event_user_firstname">' . $event['user_firstname'] . '</span> ';
echo '<span class="fiaca_event_user_lastname">' . $event['user_lastname'] . '</span>, ';
echo '<span class="fiaca_event_area_code">';
	echo anchor("EventManager/area_aspect/" . $event['area_id'], $event['area_code']); 
echo '</span>, ';
echo '<span class="fiaca_event_start_date">' . $event['event_start_date'] . '</span> ';
echo '-> ';
echo '<span class="fiaca_event_end_date">'; 
	if($event['event_end_date']){
		echo $event['event_end_date'];
	}else{
		echo "null";
	}
echo '</span> ';

?>


</div>


