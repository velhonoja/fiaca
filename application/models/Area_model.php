<?php

class Area_model extends CI_Model {

	
	
	
	
	
	public function getAll()
	{
		$query = $this->db->get('area');
		return $query->result_array();
	}
	
	
	
	

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($form_data)
	{
		$this->db->insert('area', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	
	
}
?>
