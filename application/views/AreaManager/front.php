<?php 





?>

<h2>Areas</h2>

<?php foreach ($areas as $area): 
	$this->load->view("AreaManager/form",array( "area" => $area ));
endforeach ?>


