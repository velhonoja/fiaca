<?php

// about naming models, see http://stackoverflow.com/questions/8074368/codeigniter-php-model-access-unable-to-locate-the-model-you-have-specified

class Event_type_model extends CI_Model {

        public function __construct()
        {
            // Database is already loaded in autoload.conf?
            // This should be unnecessary.
                $this->load->database();
        }
        
        

        /* 
         * get event_type by id
         */
	public function get( $id = -1)
	{
		$query = $this->db->get_where('event_type', array('event_type_id' => $id));
		return $query->row_array();
	}
	
        /* 
         * get all event_types
         */
	public function getAll()
	{
		$query = $this->db->get('event_type');
		return $query->result_array();
	}



//update

// delete? do we need to delete anyway?
        
        
        
}



