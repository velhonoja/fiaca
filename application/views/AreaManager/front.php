<?php 





?>

<h2>Areas</h2>

<?php $this->load->view("form_validation_errors"); ?>

<?php 
foreach ($areas as $area): 
	$this->load->view("AreaManager/form",array( "area" => $area ));
endforeach;


?>
<h2>Create new area</h2>
<?php
// one more form for creating "new" 
$new_default_data =  array(
		'area_code' => "",
		'area_location' => "",
		'area_tostats' => "0",
		'area_group' => ""
	);

$this->load->view("AreaManager/form", array( "area" =>	$new_default_data ));

