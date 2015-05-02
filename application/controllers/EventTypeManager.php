<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventTypeManager extends CI_Controller {
    
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('fiacaform_helper');
                $this->load->library('form_validation');
                $this->load->model('event_type_model');
                
        }

	
	
    public function index() 
    {
    	    
	if( $this->input->post(NULL, TRUE) ){ // if we have post data, lets do something about that
		$this->handle_form();
	}
    	    
    	$data = array(
            'content' => "EventTypeManager/front", // content is not "content"-data it means view that should be loaded
            'event_types' => $this->event_type_model->getAll()
        );
        
        $this->load->view("template", $data);
        
    }
    
	function handle_form()
	{			
		$this->form_validation->set_rules('event_type_name', 'event_type_name', 'required|trim');			

			
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			// do nothing
		}
		else // passed validation proceed to post success logic
		{
		 	
			// build array for the model
			$form_data = array(
					       	'event_type_name' => $this->input->post('event_type_name'),
					       	'event_type_hasduration' => ($this->input->post('event_type_hasduration') != FALSE ? 1 : 0),
					       	'event_type_tostats' => ($this->input->post('event_type_tostats') != FALSE ? 1 : 0),
					       	'event_type_effects_borrowing' => ($this->input->post('event_type_effects_borrowing') != FALSE ? 1 : 0)
						);
		
			$this->event_type_model->save($form_data, $this->input->post('event_type_id'));
			
		}
	}
	

    
}
