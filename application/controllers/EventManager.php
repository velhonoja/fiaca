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
     
    /* 
    Edit/view events that are linked to this area.
    
    We dont need to add "select area" to form, because we know it already.
    
    TODO: add "select user", start/end-dates, and event type form-fields
    */
    public function area_aspect( $area_id ){
    	
    	$this->form_validation->set_rules('area_id','Area','required');
    	$this->form_validation->set_rules('user_id','User','required');
    	$this->form_validation->set_rules('event_type_id','Event type','required');
    	$this->form_validation->set_rules('event_start_date','Start date','required');
    	//$this->form_validation->set_rules('event_end_date','End date','');
    	 
    	// validate if there is some form data (user is selected)
    	if( $this->input->post('user_id', true) ){
			if ($this->form_validation->run() ){
				// save new event
				echo "should save new event now..";
				
				// clear form data
				echo " .. should clear form data now..";
			}else{ echo ".. NOT VALID .. "; }
		}else{ echo "no need to validate form, no user selected.. "; }
    	
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