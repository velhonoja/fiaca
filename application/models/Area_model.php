<?php

class Area_model extends CI_Model {

	
	
	
	
	
	public function getAll()
	{
		$query = $this->db->get('area');
		return $query->result_array();
	}
	
	
	
	

	function save($form_data, $row_id)
	{
		
		// if we have id lets update existing row
		if( $row_id ){
			//echo "<h1>Trying to update...</h1>";
			$this->db->update('area', $form_data, 'area_id="'.$row_id.'"');
		}else{ // or create new
			//echo "<h1>Creating new...</h1>";
			$this->db->insert('area', $form_data);
		}
		
	}
	
	
	
}
?>
