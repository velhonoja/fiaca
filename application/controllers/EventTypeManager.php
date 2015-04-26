<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventTypeManager extends CI_Controller {
    
        public function __construct()
        {
                parent::__construct();
                $this->load->model('event_type_model');
        }

	
	
    public function index() 
    {
    	$data = array(
            'content' => "EventTypeManager/front", // content is not "content"-data it means view that should be loaded
            'event_types' => $this->event_type_model->getAll()
        );
        
        $this->load->view("template", $data);
        
    }
    
}
