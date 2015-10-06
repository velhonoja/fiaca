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
	
	/*
         * Finds area ID based on area code
         */
        public function findAreaID( $area_code ) {
            $area_id = $this->db->where( "area_code", $area_code )
                    ->limit(1)
                    ->get("area")->row()->area_id;
            if ( is_numeric($area_id) ) {
                return $area_id;
            } else {
                return NULL;
            }
            
        }
	
}
?>
