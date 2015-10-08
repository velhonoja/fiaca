<?php


class Event_model extends CI_Model {


        
        

        /* 
         * get event by id
         */
	public function get( $id = -1)
	{
		//$query = $this->db->get_where('event', array('event_id' => $id));
		//return $query->row_array();
		
		
		$this->db->select('*');
		$this->db->from('event');
		$this->db->join('event_type', 'event_type.event_type_id = event.event_id');
		$this->db->join('area', 'area.area_id = event.event_area');
		$this->db->join('user', 'user.user_id = event.event_user');
		$this->db->where('event_id', $id);
		$query = $this->db->get();
		return $query->result_array();
		
		
	}
	
        /* 
         * get latest events
         */
	public function getRecent( $amount )
	{
		//$query = $this->db->get('event');
		//return $query->result_array();
		
		$this->db->select('*');
		$this->db->from('event');
		$this->db->join('event_type', 'event_type.event_type_id = event.event_id');
		$this->db->join('area', 'area.area_id = event.event_area');
		$this->db->join('user', 'user.user_id = event.event_user');
		$this->db->order_by('event_id', 'desc');
		$this->db->limit($amount);
		$query = $this->db->get();
		return $query->result_array();
				
	}
	
	
        /* 
         * get events for area (limit amount to load with second argument)
         */
	public function getForArea($area_id,  $amount )
	{
		//$query = $this->db->get('event');
		//return $query->result_array();
		
		$this->db->select('*');
		$this->db->from('event');
		$this->db->join('event_type', 'event_type.event_type_id = event.event_id');
		$this->db->join('area', 'area.area_id = event.event_area');
		$this->db->join('user', 'user.user_id = event.event_user');
		$this->db->where('area_id', $area_id);
		$this->db->limit($amount);
		$query = $this->db->get();
		return $query->result_array();
				
	}



	function save($form_data, $row_id)
	{
		
		// if we have id lets update existing row
		if( $row_id ){
			$this->db->update('event', $form_data, 'event_id="'.$row_id.'"');
		}else{ // or create new 
			$this->db->insert('event', $form_data);
		}
		
	}
	 
        
        
        
}


