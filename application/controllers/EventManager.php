<?php
class EventManager extends CI_Controller  {
    
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('fiacaform_helper');
                $this->load->library('form_validation');
                $this->load->model('event_model');
                $this->load->model('area_model');
                $this->load->model('user_model');
                $this->load->model('event_type_model');
                
        }
	
    
    public function index() {
    	    
    	    
	if( $this->input->post(NULL, TRUE) ){ // if we have post data, lets do something about that
		//$this->handle_form();
		echo "TODO: actually do something with form data";
	}
    	    
	$data = array(
	    'content' => "EventManager/latest_events",
	    'events' => $this->event_model->getRecent(20)
	    //'areas' => $this->area_model->getAll(),
	    //'users' => $this->user_model->getAllUsers(),
	    //'event_types' => $this->event_type_model->getAll()
	); 
	
	$this->load->view("template", $data);
	
	// just for testing
	//var_dump( $this->event_model->get(1) );
    
    	    
    }
    
    public function area_aspect( $area_id ){
    	
		$data = array(
		    'content' => "EventManager/area_aspect",
		    'events' => $this->event_model->getForArea($area_id, 50),
		    'area' => $this->area_model->get($area_id),
		    'users' => $this->user_model->getAllUsers(),
		    'event_types' => $this->event_type_model->getAll()
		); 
		
		$this->load->view("template", $data);
	
	    
    }
    
    
}