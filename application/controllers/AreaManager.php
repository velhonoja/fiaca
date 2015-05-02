<?php

class AreaManager extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('fiacaform_helper');
		$this->load->model('area_model');
	}	
	
	
	function index()
	{
		

		if( $this->input->post(NULL, TRUE) ){ // if we have post data, lets do something about that
			$this->handle_form();
		}
		
		$data = array(
		    'content' => "AreaManager/front",
		    'areas' => $this->area_model->getAll()
		);
		
		$this->load->view("template", $data);
		
	}
	
	
	function handle_form()
	{			
		$this->form_validation->set_rules('area_code', 'area_code', 'required|trim');			
		$this->form_validation->set_rules('area_location', 'area_location', 'required|trim');				
		//$this->form_validation->set_rules('area_tostats', 'area_tostats', '');			
		$this->form_validation->set_rules('area_group', 'area_group', 'trim');
			
		//$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			// $this->load->view('Area Manager_view');
		}
		else // passed validation proceed to post success logic
		{
		 	
			// build array for the model
			$form_data = array(
					       	'area_code' => $this->input->post('area_code'),
					       	'area_location' => $this->input->post('area_location'),
					       	'area_tostats' => ($this->input->post('area_tostats') != FALSE ? 1 : 0),
					       	'area_group' => $this->input->post('area_group')
						);
		
			$this->area_model->save($form_data, $this->input->post('area_id'));
			
		}
	}

}
?>
